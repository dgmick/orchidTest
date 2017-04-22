<?php

namespace AppBundle\Form;

use AppBundle\Entity\Employer;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PosteType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            /* Faut arrêter la drogue
            ->add('Poste', EntityType::class, array(
            'class' => 'AppBundle\Entity\Poste',
            'choice_label' => 'poste',
            'expanded' => false,
            'multiple' =>false,
            'label' => ' ' ))
            */
          /*  ->add('Employer', EmployerType::class)
            ->add('City', CityType::class)
            ->add('Temps' , TempsType::class)
            ->add('envoyer', SubmitType::class)*/

            ->add('poste')
            ->add('city')
            ->add('temps')
            ->add('employer')
            ->add('envoyer', SubmitType::class)
        ;


    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Poste'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_poste';
    }


}
