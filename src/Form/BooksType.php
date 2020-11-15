<?php

namespace App\Form;

use App\Entity\Books;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;


class BooksType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): array
    {
        $builder
            ->add('title', TextType::class, [
                'label' => 'Название книги'
            ])
            ->add('author', TextType::class,['label' => 'Автор'])
            ->add('year', TextType::class,['label' => 'Год издания'])
            ->add('body', TextareaType::class, [
                'label' => 'Краткое описание содержания...'
            ]);

        return $options;
    }

    public function configureOptions(OptionsResolver $resolver): object
    {
        $resolver->setDefaults([
            'data_class' => Books::class,
        ]);

        return $resolver; 
    }
}
