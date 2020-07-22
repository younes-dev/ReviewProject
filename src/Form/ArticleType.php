<?php

namespace App\Form;

use App\Entity\Article;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ArticleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title',TextType::class)
            ->add('Resume',TextType::class)
            ->add('size',TextType::class)
//            ->add('Content',TextareaType::class,[
//                'attr' => [
//                   'cols' => 150,
//                    'size' => 110
//                ]
//            ])
            ->add('Content', TextareaType::class,[
                'attr' =>[
                    'class' =>'form-control',
                    'style' =>'margin-bottom:15px;height:150px',
                    'required' => false
                ],
                    'empty_data'  => null
            ])

            ->add('CreatedAt')
            ->add('UpdatedAt')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Article::class,
        ]);
    }
}
