<?php
namespace AppBundle\Controller;

use AppBundle\Entity\City;
use AppBundle\Entity\Poste;
use AppBundle\Entity\Revenues;
use AppBundle\Entity\Temps;
use AppBundle\Entity\Employer;
use AppBundle\Form\CityType;
use AppBundle\Form\TempsType;
use AppBundle\Form\PosteType;
use AppBundle\Form\EmployerType;
use CMEN\GoogleChartsBundle\GoogleCharts\Charts\ColumnChart;
use CMEN\GoogleChartsBundle\GoogleCharts\Charts\PieChart;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;


class StatController extends Controller
{

    /**
     * @Route("/stat", name="stat")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction(Request $request){
        //creation de l'entity Poste
        $poste = new Poste();

        $formPoste = $this->get('form.factory')->create(PosteType::class, $poste );

        // je verifie si ma requete est en poste et que les
        // valeurs sont correct
        if ($request->isMethod('POST')&& $formPoste->handleRequest($request)->isValid()) {
            $em = $this->getDoctrine()->getManager();
            // je persiste
            $em->persist($poste);
            // je declare l'enregistrement
            $em->flush();
        }
        
        //Acces au service Doctrine
         $doctrine = $this->container->get('doctrine');
        $em = $doctrine->getManager();

        //Acces au repository de l'entitee
        $spendTimeRepository = $em->getRepository('AppBundle:SpendTime');
        $cityRepository = $em->getRepository('AppBundle:City');
        $posteRepository = $em->getRepository('AppBundle:Poste');

        
        //Recuperartion de l'ensemble des données liees à l'entitée.
        $spendList = $spendTimeRepository->findAll();
        $cityList = $cityRepository->findAll();
        // dump($cityList);die();
        $postList = $posteRepository->findAll();

        /*********** Pie Chart **********/

        //j'utilise un findAll pour recuperer dans ma Table "Temps "
        //toutes mes données en choisisant les colonnes :
        // " Temps" et "TempLibre"
        // $items stock les données deu repository "Temps"
        $items = $this->getDoctrine()->getRepository(Temps::class)->findAll();
        // je liste des données a ajouter
        $temps = 0;
        $tempsLibre = 0;
        // j'utilise "foreach" pour parcourir mon tableau d'objets

        foreach ($items as $item) {
            $temps += $item->getTemps();
        $tempsLibre += $item->getTempLibre();
    }

        // Création de l'entité PieChart
        $pieChart = new PieChart();
        $pieChart->getData()->setArrayToDataTable([
            [ 'Task', 'Hours per Day' ],
            [ 'Work', $temps ],
            [ 'temp libre', $tempsLibre ]
        ]);
        $pieChart->getOptions()->setTitle('You still in work');
        $pieChart->getOptions()->getTitleTextStyle()->setFontSize(20);
        $pieChart->getOptions()->setHeight(300);
        $pieChart->getOptions()->setWidth(500);


        //************** Column Chart controller **********/

        //j'utilise un findAll pour recuperer dans ma Table "revenue "
        //toutes mes données en choisisant les colonnes :
        // " Reveue" et "Cost"
        $items =$this->getDoctrine()->getRepository(Revenues::class)->findAll();
        // je stock mes variable "revenu" et "cost"
        $revenu = 0;
        $cost = 0;

        // je fais un foreach
        foreach ($items as $item){
            $revenu += $item->getRevenu();
            $cost += $item->getCosts();
        }

        $col = new ColumnChart();
        $col->getData()->setArrayToDataTable(
            [
                ['Move', 'Percentage'],
                ["Revenues", (int) $revenu],
                ["Cost", (int) $cost],
            ]
        );

        $col->getOptions()->setHeight(300);
        $col->getOptions()->setWidth(500);
        $col->getOptions()->setTitle('Revenue & Cost');
        $col->getOptions()->getTitleTextStyle()->setFontSize(20);

       // dump($col);die();

        return $this->render('stat/projectSheet.html.twig', array(
            'spendList' => $spendList,
            'cityList' => $cityList,
            'postList' => $postList,
            'poste' => $formPoste->createView(),
            'piechart' => $pieChart,
            'col' => $col,

        ));
    }

    public function addAction(){

    }

    /**
     * @Route("/test-chart", name="testChart")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function statAction()
    {
        $pieChart = new PieChart();
        $data = $this->getDoctrine()->getRepository(Temps::class)->find(1);
        $pieChart->getData()->setArrayToDataTable( array(
                ['Task', 'Hours per Day'],
                ['Work',       $data->getTemps()],
                ['temp libre',         $data->getTempLibre()],
            ));
        $pieChart->getOptions()->setTitle('You still in work');
      /*  $pieChart->getOptions()->setHeight(400);
        $pieChart->getOptions()->setWidth(400);
        $pieChart->getOptions()->getTitleTextStyle()->setColor('#07600');*/
        $pieChart->getOptions()->getTitleTextStyle()->setFontSize(20);
        $pieChart->getOptions()->getBackgroundColor('#07600');
        $pieChart->getOptions()->setHeight(300);
        $pieChart->getOptions()->setWidth(500);


        $col = new ColumnChart();
        $revenue = $this->getDoctrine()->getRepository(Revenues::class)->find(1);
        $col->getData()->setArrayToDataTable(
            [
                ['Move', 'Percentage'],
                ["Revenues", (int) $revenue->getRevenu()],
                ["Cost", (int) $revenue->getCosts()],
            ]
        );

        $col->getOptions()->setHeight(300);
        $col->getOptions()->setWidth(500);
        $col->getOptions()->setTitle('Revenue & Cost');
        $col->getOptions()->getTitleTextStyle()->setFontSize(20);


        $barChart = new BarChart();
        $pays = $this->getDoctrine()->getRepository(Revenues::class)->find(2);
        $barChart->getData()->setArrayToDataTable(
            [
                ['year', 'Pays'],
                ['Paris', (int)$pays->getSpend()],
                ['London', (int) $pays->getRevenu()],
                ['Honk Kong', (int) $pays->getRevenu()],
                ['Rio', (int) $pays->getRevenu()],
                ['New York', (int) $pays->getRevenu()],

            ]
        );
        $barChart->getOptions()->setTitle('Pays');
        $barChart->getOptions()->setHeight(200);
        $barChart->getOptions()->getTitleTextStyle()->setFontSize(20);

        return $this->render(':stat:teste.html.twig', array(
                'piechart' => $pieChart,
                'col' => $col,
                'bar' => $barChart
            )
        );
    }



    /**
     * @Route("/test-colum", name="test-colum")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function columAction(){
        $col = new ColumnChart();

        $revenue = $this->getDoctrine()->getRepository(Revenues::class)->find(1);

        $col->getData()->setArrayToDataTable(
            [
                ['Move', 'Percentage'],
                ["Revenues", (int) $revenue->getRevenu()],
                ["Cost", (int) $revenue->getCosts()],
            ]
        );

        $col->getOptions()->setHeight(222);

        return $this->render('stat/teste_colum.html.twig', array(
                'col' => $col,
            )
        );
    }


    /**
     * @Route("/bar-chart", name="bar-chart")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function barChartAction(){

        $barChart = new BarChart();

        $pays = $this->getDoctrine()->getRepository(Revenues::class)->find(2);

        $barChart->getData()->setArrayToDataTable(
            [
                ['year', 'Pays'],
                ['france', (int)$pays->getSpend()],
                ['london', (int) $pays->getRevenu()],

            ]
        );

        return $this->render('stat/teste_bar.html.twig', array(
            'bar' => $barChart
        ));
    }



    /**
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function employerAction(Request $request){
        $employer = new Employer();

        $form = $this->get('form.factory')->create(EmployerType::class, $employer);

        if($form->handleRequest($request)->isValid()){
            $em = $this->getDoctrine()->getManager();
            $em->persist($employer);
            $em->flush();
        }

        return $this->render('stat/projectSheet.html.twig',[
            'employer' =>$form->createView(),

        ]);

    }


}