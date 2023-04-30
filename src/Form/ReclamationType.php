<?php

namespace App\Form;
use App\Entity\ReponseReclamation;

use App\Entity\Reclamation;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use DateTimeImmutable; // add this at the top of your file
use Symfony\Component\Form\Extension\Core\Type\DateTimeType; // add this at the top of your file
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class ReclamationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('email')
            ->add('reportedEmail')
            ->add('sujet', ChoiceType::class, [
                'choices' => [
                    'Services' => 'Services',
                    'Evenement' => 'Evenement',
                    'Cours' => 'Cours',
                    'Autres' => 'Autres',
                ],
            ])
            ->add('date', DateTimeType::class, [
                'data' => new DateTimeImmutable(),
            ])
            ->add('telephone')
            ->add('description')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Reclamation::class,
        ]);
    }
}
