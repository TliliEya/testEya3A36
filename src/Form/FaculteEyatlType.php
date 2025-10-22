<?php
namespace App\Form;

use App\Entity\FaculteEyatl;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FaculteEyatlType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom', TextType::class, ['label' => 'nom'])
            ->add('cnss', IntegerType::class, ['label' => 'cnss'])
            ->add('save', SubmitType::class, ['label' => 'save']); // same as prof style
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => FaculteEyatl::class,
        ]);
    }
}
