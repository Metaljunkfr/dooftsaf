<?php

namespace App\Form;

use App\Entity\Contact;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\AbstractType;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $builder
            ->add('lastName', TextType::class, [
                'label' => 'Last Name : ',
                'attr' => [
                    'placeholder' => 'Last Name'
                ]
            ])
            ->add('firstName', TextType::class, [
                'label' => 'First Name : ',
                'attr' => [
                    'placeholder' => 'First Name'
                ]
            ])
            ->add('email', EmailType::class, [
            'label' => 'Email : ',
                'attr' => [
                    'placeholder' => 'Email'
                ]
            ])
            ->add('object', TextType::class, [
                'label' => 'Object : ',
                'attr' => [
                    'placeholder' => 'Object'
                ]
            ])
            ->add('message', TextareaType::class, [
                'label' => 'Message : ',
                'attr' => [
                    'placeholder' => 'Message'
                ]
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Contact::class,
            'user' => null,
        ]);
    }
}
