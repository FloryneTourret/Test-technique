<?php

namespace App\Form;

use App\Entity\Article;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\FileType;

class ArticleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', TextType::class, array(
                'row_attr' => array(
                    'class' => 'uk-margin',
                ),
                'label' => false,
                'attr' => [
                    'placeholder' => 'Titre',
                    'class' => 'uk-input'
                ]
            ))            
            ->add('description', TextType::class, array(
                'row_attr' => array(
                    'class' => 'uk-margin',
                ),
                'label' => false,
                'attr' => [
                    'placeholder' => 'Description',
                    'class' => 'uk-input'
                ]
			))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => Article::class,
        ));
    }
}