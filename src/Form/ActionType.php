<?php

namespace App\Form;

use App\Entity\Action;
use App\Entity\Game;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ActionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nameQuestion')
            ->add('descriptionQuestion')
            ->add('duration')
            ->add('actionPeriod')
            ->add('app')
            ->add('isAvailable')
            ->add('game')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Action::class,
            'game' => Game::class,
        ]);
    }
}
