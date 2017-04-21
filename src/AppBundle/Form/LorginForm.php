<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class LorginForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $builder
            ->add('_username', TextType::class,[
                'label' => ' ',
                'attr' => ['rows'=>'8'],
                'attr' => ['placeholder'=>'Votre Identifiant']
            ])
            ->add('_password', PasswordType::class,[
                'label' => '  ',
                'attr' => ['rows'=>'8'],
                'attr' => ['placeholder'=>'Mot De Passe ']
            ])
        ;

    }


}
