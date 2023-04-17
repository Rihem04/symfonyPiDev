<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints as Assert;


class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            
            ->add('nom', TextType::class,[
                'label' => "nom",
                'attr' => [
                    'class' => 'form-control'
                ],
                'constraints' => [
                    new Assert\NotBlank(['message' => 'Le champ nom ne peut pas être vide']),
                    
                ]
            ])
            
            ->add('prenom', TextType::class,[
                'label' => "prenom",
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            
            
            ->add('mail', EmailType::class, [
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            
            ->add('password', PasswordType::class,[
                'label' => "Mot de passe",
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            
            ->add('numero_telephone', NumberType::class,[
                'label' => "Numéro de téléphone",
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            
            ->add('role', TextType::class,[
                'label' => "role",
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            
            
            ->add('addresse', TextType::class,[
                'label' => "addresse",
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            
            ->add('image', TextType::class,[
                'label' => "image",
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            
            ->add('cv')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
