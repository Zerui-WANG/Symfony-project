<?php

namespace App\Form;

use App\Entity\Event;
use App\Entity\Game;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EventType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nameQuestion')
            ->add('descriptionQuestion')
            ->add('cooldown')
            ->add('frequency')
            ->add('cooldownMin')
            ->add('cooldownMax')
            ->add('game')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Event::class,
            'game' => Game::class,
        ]);
    }
}
