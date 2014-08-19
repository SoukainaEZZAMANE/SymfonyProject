<?php

namespace Najdah\UserBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class UserModifierType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('username', 'text')
            ->add('email', 'email')
            ->add('enabled', 'checkbox', array('required' => false))
            ->add('locked', 'checkbox', array('required' => false))
            ->add('matricule', 'text')
            ->add('nom', 'text')
            ->add('adresse', 'text')
            ->add('tel', 'text')
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
            'data_class' => 'Najdah\UserBundle\Entity\User'
        ));
    }

    public function getName()
    {
        return 'najdah_userbundle_usermodifiertype';
    }
}
