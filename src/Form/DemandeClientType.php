<?php

namespace App\Form;

use App\Entity\DemandeClient;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class DemandeClientType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('titre')
            ->add('description')
            ->add('competence')
            ->add('prix')
            //->add('etat')
            ->add('dateLimite')
            // ->add('dateCreation')
            // ->add('idFreelance')
            ->add('idClient');
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => DemandeClient::class,
        ]);
    }
}
