<?php

namespace App\Form;

use App\Entity\NoteSimulation;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class NoteSimulationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('A1T1')
            ->add('A1T2')
            ->add('A1T3')
            ->add('A2T1')
            ->add('A2T2')
            ->add('A2T3')
            ->add('ScienEP1')
            ->add('ScienEP2')
            ->add('ScienEP3')
            ->add('HistEP1')
            ->add('HistEP2')
            ->add('HistEP3')
            ->add('LVAEP1')
            ->add('LVAEP2')
            ->add('LVAEP3')
            ->add('LVBEP1')
            ->add('LVBEP2')
            ->add('LVBEP3')
            ->add('EPSEP1')
            ->add('EPSEP2')
            ->add('EPSEP3')
            ->add('SPEEP1')
            ->add('SPEEP2')
            ->add('SPEEP3')
            ->add('FranE')
            ->add('FranO')
            ->add('Philo')
            ->add('GrandOral')
            ->add('Spe1')
            ->add('Spe2')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => NoteSimulation::class,
        ]);
    }
}
