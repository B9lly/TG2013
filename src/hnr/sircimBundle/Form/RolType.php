<?php

namespace hnr\sircimBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class RolType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('roNombre')
            ->add('roDescripcion')
            ->add('roModificable')
            ->add('roEstado')
            ->add('roUsuarioCreacion')
            ->add('roUsuarioModificacion')
            ->add('roFechaCreacion')
            ->add('roFechaModificacion')
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'hnr\sircimBundle\Entity\Rol'
        ));
    }

    public function getName()
    {
        return 'hnr_sircimbundle_roltype';
    }
}
