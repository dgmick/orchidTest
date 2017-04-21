<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Historique_employer;
use AppBundle\Form\Historique_employerType;
use AppBundle\Form\LorginForm;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\ParameterBag;
use AppBundle\Form\ContactType;
use AppBundle\Form\EmployerType;
use AppBundle\Form\PosteType;
use AppBundle\Form\CityType;
use AppBundle\Form\TempsType;
use AppBundle\Entity\Employer;
use AppBundle\Entity\Contact;
use AppBundle\Entity\Poste;
use AppBundle\Entity\City;
use AppBundle\Entity\Temps;

class UserController extends Controller
{



    /**
     * @Route("/test-formulaire", name="test-formulaire")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function testAction(Request $request ){

        $historique = new Historique_employer();

        $formHistorique = $this->createForm(Historique_employerType::class, $historique);

        $formHistorique->handleRequest($request);

        if ($formHistorique->isSubmitted() && $formHistorique->isValid()) {
            $historiqueData = $formHistorique->getData();

            $em = $this->getDoctrine()->getManager();
            $em->persist($historiqueData);
            $em->flush();
        }

        return $this->render(':stat:teste.html.twig', array(
            'historique' => $formHistorique->createView(),
        ));

    }
    
    
    
    /**
     *@Route("/message", name="message")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function contactUsAction(Request $request){

        $contact = new Contact();
        
        $form = $this->get('form.factory')->create(ContactType::class, $contact);
        if ($form->handleRequest($request)->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($contact);
            $em->flush();
            $this->get('session')->getFlashBag()->add(
                'success',
                'Votre message a bien ete envoyé');

            return $this->redirectToRoute('message');
        }
        return $this->render('bloc/message.html.twig', array(
            'contact' => $form->createView(),
        ));

    }


    /**
     * @return \Symfony\Component\HttpFoundation\Response
     * @Route("/personnel", name="personnel")
     */
    public function formationAction(){
        //Acces au service Doctrine
        $doctrine = $this->container->get('doctrine');
        $em = $doctrine->getManager();
        //Acces au repository de l'entitee
        $employerRepository = $em->getRepository('AppBundle:Employer');
        //Recuperartion de l'ensemble des données liees à l'entitée.
        $employer = $employerRepository->findAll();
        //dump($employer);die();
        return $this->render('bloc/employerTableau.html.twig', array(
            'employer' => $employer
        ));
    }


    /**
     * @Route("/login", name="login")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function loginAction(Request $request)
    {
        // Si le visiteur est déjà identifié, on le redirige vers l'accueil
        if ($this->get('security.authorization_checker')->isGranted('IS_AUTHENTICATED_REMEMBERED')) {
            return $this->redirectToRoute('homepage');
        }

        // Le service authentication_utils permet de récupérer le nom d'utilisateur
        // et l'erreur dans le cas où le formulaire a déjà été soumis mais était invalide
        // (mauvais mot de passe par exemple)
        $authenticationUtils = $this->get('security.authentication_utils');

        return $this->render(':security:loging.html.twig', array(
            'last_username' => $authenticationUtils->getLastUsername(),
            'error'         => $authenticationUtils->getLastAuthenticationError(),
        ));
    }


    /**
     * @Route("/register", name="register")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function registerAction(){




        return $this->render('@FOSUser/Registration/register_content.html.twig',array(

        ));
    }

    /**
     * This is the route the login form submits to.
     *
     * But, this will never be executed. Symfony will intercept this first
     * and handle the login automatically. See form_login in app/config/security.yml
     *
     * @Route("/login_check", name="login_check")
     */
    public function loginCheckAction()
    {
        throw new \Exception('This should never be reached!');
    }

    /**
     * This is the route the user can use to logout.
     *
     * But, this will never be executed. Symfony will intercept this first
     * and handle the logout automatically. See logout in app/config/security.yml
     *
     * @Route("/logout", name="logout")
     */
    public function logoutAction()
    {
        throw new \Exception('This should never be reached!');
    }


  
    



}
