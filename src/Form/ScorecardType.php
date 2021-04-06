<?php

namespace App\Form;

use App\Entity\Scorecard;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\ChoiceList\ChoiceList;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;

class ScorecardType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $scorecard = new Scorecard;
        $builder
            ->add('label')
            ->add('Counter', CheckboxType::class, [
                'mapped' => false,
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Scorecard::class,
        ]);
    }
}
