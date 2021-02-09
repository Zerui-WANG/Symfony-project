<?php

namespace App\Form;

use App\Entity\Answer;
use App\Entity\EffectPlayer;
use App\Entity\EffectStudent;
use App\Entity\Question;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AnswerType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $builder
            ->add('descriptionAnswer')
            ->add('question', EntityType::class,
                [
                    'class'=>Question::class,
                    'choice_label'=>function(Question $question){

                return sprintf('(%d) %s', $question->getId(), $question->getNameQuestion());

                }
            ])
            ->add('effectStudents', EntityType::class,
                [
                    'class'=>EffectStudent::class,
                    'choice_label'=>function(EffectStudent $effectStudent){

                        return sprintf('%d (%s)', $effectStudent->getCharacteristicStudent(), $effectStudent->getValueEffectStudent());

                    }
                ])
            ->add('effectPlayers',EntityType::class,
                [
                    'class'=>EffectPlayer::class,
                    'choice_label'=>function(EffectPlayer $effectPlayer){

                        return sprintf('%d (%s)', $effectPlayer->getCharacteristicPlayer(), $effectPlayer->getValueEffectPlayer());

                    }
                ])
        ;

    }



    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Answer::class,
        ]);
    }
}
