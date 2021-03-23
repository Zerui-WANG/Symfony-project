<?php

namespace App\Form;

use App\Entity\Answer;
use App\Entity\EffectStudent;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EffectStudentType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('valueEffectStudent')
            ->add('characteristicStudent', ChoiceType::class, [
                'choices' => [
                    'La caractéristique touchée' => [
                        'Assiduité' => 'attendance',
                        'Personnalité' => 'personality',
                        'Notes' => 'grade',
                        'En échec' => 'is_failure',
                        'Présent' => 'is_present'
                    ]
                ]
            ])
            ->add('answers', EntityType::class, [
                'class' => Answer::class,
                'choice_label'=>function(Answer $answer){

                    return $answer->getId();
                },
                'multiple' => true,
                'required'=> false
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => EffectStudent::class,
            'answers' => Answer::class,
        ]);
    }
}
