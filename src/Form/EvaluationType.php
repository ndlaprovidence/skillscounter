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
use Symfony\Component\Form\Extension\Core\Type\NumberType;

class EvaluationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('label')
            ->add('description', TextType::class, [
                'required' => false,
                'label' => 'description'
            ])
            ->add('dateEvaluation', DateType::class, [
                'widget' => 'single_text',
            ])
            ->add('valueNote1', NumberType::class, ['label' => 'Valeur de la première note'])
            ->add('valueNote2', NumberType::class, ['label' => 'Valeur de la seconde note'])
            ->add('valueNote3', NumberType::class, ['label' => 'Valeur de la troisième note'])
            ->add('valueNote4', NumberType::class, ['label' => 'Valeur de la quatrième note'])
            ->add('scorecard', EntityType::class, [

                'label' => 'Fiche',

                // looks for choices from this entity
                'class' => Scorecard::class,
            
                // uses the User.username property as the visible option string
                'choice_label' => 'label',
            
                // used to render a select box, check boxes or radios
                // 'multiple' => true,
                'expanded' => true,
            ])
            ->add('student', EntityType::class, [
                'label' => 'Elève',

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
