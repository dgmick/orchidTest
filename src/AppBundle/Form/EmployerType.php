<?php

namespace AppBundle\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EmployerType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        /*
         * Actuellement dans ton entité employé c'est seulement une simple donnée et non une relation
        $builder->add('employer', EntityType::class, array(
            'class'        => 'AppBundle\Entity\Employer',
            'choice_label' => 'Employer',
            'expanded'     => false,
            'multiple'     => false,
            'label'        => ' ',
        ))
        */

        $builder
            ->add('employer')
            ->add('city')
            ->add('poste')
        ;

    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Employer'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_employer';
    }


}
