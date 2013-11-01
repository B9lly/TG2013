<?php

namespace hnr\sircimBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class AreaType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('arNombre')
            ->add('arDescripcion')
            ->add('arCupo')
            ->add('arEstadoCupo')
            ->add('arEstado')
            ->add('arUsuarioCreacion')
            ->add('arUsuarioModificacion')
            ->add('arFechaCreacion')
            ->add('arFechaModificacion')
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'hnr\sircimBundle\Entity\Area'
        ));
    }

    public function getName()
    {
        return 'hnr_sircimbundle_areatype';
    }
}
