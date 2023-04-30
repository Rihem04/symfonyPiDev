<?php

namespace App\Form;
use App\Entity\Reclamation;
use App\Entity\ReponseReclamation;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class ReponseReclamationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('traitement')
            ->add('contenueReponse')
            ->add('idreclamation',EntityType::class,['class'=> Reclamation::class,
          'choice_label'=>'email',
          'label'=>'To Email']);
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => ReponseReclamation::class,
        ]);
    }
}
