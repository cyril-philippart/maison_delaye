<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\NotBlank;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('firstname', null, [
            'label' => 'Nom *',
            'constraints' => [
                new NotBlank()
            ]
        ])
        ->add('lastname', null, [
            'label' => 'Prénom *',
            'constraints' => [
                new NotBlank()
            ]
        ])
        ->add('company', null, [
            'label' => 'Société',
        ])
        ->add('mail', EmailType::class, [
            'label' => 'Email *',
            'constraints' => [
                new NotBlank()
            ]
        ])
        ->add('object', null, [
            'label' => 'Objet *',
            'constraints' => [
                new NotBlank()
            ]
        ])
        ->add('message', TextareaType::class, [
            'label' => 'Message *',
            'constraints' => [
                new NotBlank()
            ]
        ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
