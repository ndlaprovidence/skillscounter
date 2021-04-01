<?php

namespace App\Form;

use App\Entity\Fiches;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FichesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('BAC_obteined')
            ->add('Situation')
            ->add('old_study')
            ->add('Forces')
            ->add('Weakness')
            ->add('Activity')
            ->add('Inscription')
            ->add('future_job')
            ->add('telling_about_me')
            ->add('self_express')
            ->add('Speciality')
            ->add('first_language')
            ->add('second_language')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Fiches::class,
        ]);
    }
}
