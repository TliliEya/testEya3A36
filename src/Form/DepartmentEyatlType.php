<?php

namespace App\Form;

use App\Entity\DepartementEyatl;
use App\Entity\FaculteEyatl;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class DepartmentEyatlType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('mat', TextType::class, ['label' => 'mat'])
            ->add('home', TextType::class, ['label' => 'home'])
            ->add('faculte', EntityType::class, [
                'class'        => FaculteEyatl::class,
                'choice_label' => 'nom',              // show the "nom" field from FaculteEyatl
                'placeholder'  => '— select faculte —',
                'label'        => 'faculte_id',       // matches column label style
            ])
            ->add('save', SubmitType::class, [
                'label' => 'save'                     // same label style as in symfony3A36
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => DepartementEyatl::class,
        ]);
    }
}
