<?php

namespace App\Form;

use App\Entity\Projet;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\Regex;
use Symfony\Component\Form\Extension\Core\Type\NumberType;

class ProjetType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('titre', TextType::class, [
            'constraints' => [
                new Length([
                    'max' => 10,
                    'maxMessage' => 'Le titre ne doit pas dépasser {{ limit }} caractères.'
                ])
            ]
        ])
        ->add('description', TextareaType::class, [
            'constraints' => [
                new Length([
                    'max' => 50,
                    'maxMessage' => 'La description ne doit pas dépasser {{ limit }} caractères.'
                ])
            ]
        ])
        ->add('prix', NumberType::class, [
            'constraints' => [
                new Length([
                    'max' => 8,
                    'maxMessage' => 'Le prix ne doit pas dépasser {{ limit }} chiffres.'
                ]),
                new Regex([
                    'pattern' => '/^\d{1,8}$/',
                    'message' => 'Le prix ne doit contenir que des chiffres et ne doit pas dépasser 8 chiffres.'
                ])
            ]
        ])
        ->add('competence', TextType::class, [
            'constraints' => [
                new Length([
                    'max' => 25,
                    'maxMessage' => 'La compétence ne doit pas dépasser {{ limit }} caractères.'
                ])
            ]
        ])
            ->add('idUser')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Projet::class,
        ]);
    }
}
