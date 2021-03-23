<?php

namespace App\Form;

use App\Entity\Answer;
use App\Entity\EffectPlayer;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EffectPlayerType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('valueEffectPlayer', TextType::class)
            ->add('characteristicPlayer', ChoiceType::class, [
                'choices' => [
                    'La caractéristique touchée' => [
                        'Humeur' => 'mood',
                        'Sommeil' => 'sleep',
                        'Pédagogie' => 'pedagogy',
                        'Charisme' => 'charisma',
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
            'data_class' => EffectPlayer::class,
            'answers' => Answer::class,
        ]);
    }
}
