<?php

namespace App\Form;

use App\Entity\EffectPlayer;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EffectPlayerType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('valueEffectPlayer')
            ->add('characteristicPlayer')
            ->add('answers')
            ->add('players')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => EffectPlayer::class,
        ]);
    }
}
