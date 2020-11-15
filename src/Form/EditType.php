<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EditType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('username', TextType::class, [
                'label' => 'Username',
                'attr' => [
                    'placeholder' => 'Username'
                ]
            ])
            ->add('lastName', TextType::class, [
                'label' => 'Last Name',
                'required' => false,
                'attr' => [
                    'placeholder' => 'Last Name'
                ]
            ])
            ->add('firstName', TextType::class, [
                'label' => 'First Name',
                'required' => false,
                'attr' => [
                    'placeholder' => 'First Name'
                ]
            ])
            ->add('email', RepeatedType::class, [
                'type' => EmailType::class,
                'invalid_message' => 'Emails must be identical',
                'required' => false,
                'first_options'  => ['label' => 'Email',
                    'attr' => [
                        'placeholder' => 'Email'
                    ]],
                'second_options' => ['label' => 'Confirm email',
                    'attr' => [
                        'placeholder' => 'Confirm email'
                    ]],
            ])

            ->add('password', RepeatedType::class, [
                'type' => PasswordType::class,
                'invalid_message' => 'Passwords must be identical',
                'required' => false,
                'first_options'  => ['label' => 'Password',
                    'attr' => [
                        'placeholder' => 'Password'
                    ]],
                'second_options' => ['label' => 'Confirm password',
                    'attr' => [
                        'placeholder' => 'Confirm password'
                    ]],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
