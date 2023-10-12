<?php

namespace App\Form;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class TripRegistrationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('participant_name', TextType::class)
            ->add('participant_surname', TextType::class)
            ->add('birth_date', DateType::class)
            ->add('parent_phone', TextType::class)
            ->add('acceptance_of_statement', CheckboxType::class);
    }
}