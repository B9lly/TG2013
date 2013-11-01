<?php

namespace hnr\sircimBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class UsuarioType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('usLogin')
            ->add('usCorreo')
            ->add('usContrasena')
            ->add('usActualizarContrasena')
            ->add('usEstadoActivo')
            ->add('usEstadoBloqueado')
            ->add('idempleado')
            ->add('usUsuarioCreacion')
            ->add('usUsuarioModificacion')
            ->add('usFechaCreacion')
            ->add('usFechaModificacion')
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'hnr\sircimBundle\Entity\Usuario'
        ));
    }

    public function getName()
    {
        return 'hnr_sircimbundle_usuariotype';
    }
}
