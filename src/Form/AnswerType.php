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

        $effect = array();
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
                    'class'=>Answer::class,
                    'choices'=>$effect->getEffectStudents(),
                ])
            ->add('effectPlayers',EntityType::class,
                [
                    'class'=>Answer::class,
                    'choices'=>$effect->getEffectPlayers(),
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
