<?php

namespace App\Form;

use App\Entity\Student;
use App\Entity\Scorecard;
use App\Entity\Evaluation;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class EvaluationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('label')
            ->add('description', TextType::class, [
                'required' => false,
            ])
            ->add('dateEvaluation', DateType::class, [
                'widget' => 'single_text',
            ])
            ->add('valueNote1')
            ->add('valueNote2')
            ->add('valueNote3')
            ->add('valueNote4')
            ->add('scorecard', EntityType::class, [
                // looks for choices from this entity
                'class' => Scorecard::class,
            
                // uses the User.username property as the visible option string
                'choice_label' => 'label',
            
                // used to render a select box, check boxes or radios
                // 'multiple' => true,
                'expanded' => true,
            ])
            ->add('student', EntityType::class, [
                // looks for choices from this entity
                'class' => Student::class,
            
                // uses the User.username property as the visible option string
                'choice_label' => 'username',
            
                // used to render a select box, check boxes or radios
                // 'multiple' => true,
                'expanded' => true,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Evaluation::class,
        ]);
    }
}
