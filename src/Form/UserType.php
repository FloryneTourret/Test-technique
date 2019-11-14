<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('email', EmailType::class, array(
                'row_attr' => array(
                    'class' => 'uk-margin',
                ),
                'label' => false,
                'attr' => [
                    'placeholder' => 'Email',
                    'class' => 'uk-input'
                ]
            ))            
            ->add('username', TextType::class, array(
                'row_attr' => array(
                    'class' => 'uk-margin',
                ),
                'label' => false,
                'attr' => [
                    'placeholder' => 'Username',
                    'class' => 'uk-input'
                ]
            ))            
            ->add('password', RepeatedType::class, array(
                'type' => PasswordType::class,
                'first_options'  => array(
                    'label' => false,
                    'attr' => [
                        'placeholder' => 'Password',
                        'class' => 'uk-input'
                    ]
                ),
                'second_options' => array(
                    'label' => false,
                    'attr' => [
                        'placeholder' => 'Repeat password',
                        'class' => 'uk-input'
                    ]
                ),
                'row_attr' => array(
                    'class' => 'uk-margin',
                )
            ))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => User::class,
        ));
    }
}