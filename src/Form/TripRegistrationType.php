<?php

namespace App\Form;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Validator\Constraints\IsTrue;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

class TripRegistrationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('participant_name', TextType::class, [
                'constraints' => [
                    new NotBlank(),
                ]
            ])
            ->add('participant_surname', TextType::class, [
                'constraints' => [
                    new NotBlank()
                ]
            ])
            ->add('birth_date', DateType::class, [
                'constraints' => [
                    new NotBlank(),

                ]
            ])
            ->add('parent_phone', TextType::class, [
                'constraints' => [
                    new NotBlank(),
                    new Length(min: 8),
                ]
            ])
            ->add('acceptance_of_statement', CheckboxType::class, [
                'constraints' => [
                    new IsTrue(),
                ]
            ]);
    }
}