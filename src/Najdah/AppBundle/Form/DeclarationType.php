<?php

namespace Najdah\AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class DeclarationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('date', 'date')
            ->add('x', 'text')
            ->add('y', 'text')
            ->add('adresse', 'text')
            ->add('nbrBlesses', 'text')
            ->add('natureLanceur', 'text')
            ->add('citoyen', 'entity', array(
                'class' => 'NajdahUserBundle:Citoyen',
                'property' => 'nom',
                'multiple' => false,
                'expanded' => false)
                )
            ->add('type', 'entity', array(
                'class' => 'NajdahAppBundle:TypeDeclaration',
                'property' => 'libelle',
                'multiple' => false,
                'expanded' => false)
                )
            ->add('etat', 'entity', array(
                'class' => 'NajdahAppBundle:EtatDeclaration',
                'property' => 'libelle',
                'multiple' => false,
                'expanded' => false)
                )
            ->add('Ville', 'entity', array(
                'class' => 'NajdahAppBundle:Ville',
                'property' => 'libelle',
                'multiple' => false,
                'expanded' => false)
                )
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Najdah\AppBundle\Entity\Declaration'
        ));
    }

    public function getName()
    {
        return 'najdah_appbundle_declarationtype';
    }
}
