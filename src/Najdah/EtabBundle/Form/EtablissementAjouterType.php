<?php

namespace Najdah\EtabBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class EtablissementAjouterType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('designation', 'text')
            ->add('x', 'text')
            ->add('y', 'text')
            ->add('adresse', 'text')
            ->add('type', 'entity', array(
                'class' => 'NajdahEtabBundle:TypeEtablissement',
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
            ->add('file', 'file')
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Najdah\EtabBundle\Entity\Etablissement'
        ));
    }

    public function getName()
    {
        return 'najdah_etabbundle_etablissementajoutertype';
    }
}
