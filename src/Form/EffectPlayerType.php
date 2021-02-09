<?php

namespace App\Form;

use App\Entity\EffectPlayer;
use App\Entity\Player;
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
            ->add('answer', ChoiceType::class, [
                'choices' => $answer = getValue(getAnswer()),
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => EffectPlayer::class,
        ]);
    }
}
