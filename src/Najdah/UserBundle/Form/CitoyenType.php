<?php

namespace Najdah\UserBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class CitoyenType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('cin', 'text')
            ->add('nom', 'text')
            ->add('prenom', 'text')
            ->add('tel', 'text')
            ->add('Nationalite', 'entity', array(
                'class' => 'NajdahAppBundle:Nationalite',
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
            'data_class' => 'Najdah\UserBundle\Entity\Citoyen'
        ));
    }

    public function getName()
    {
        return 'najdah_userbundle_citoyentype';
    }
}
