<?php

namespace hnr\sircimBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class TamanoPlacaType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('tpTamano')
            ->add('tpEstado')
            ->add('tpUsuarioCreacion')
            ->add('tpUsuarioModificacion')
            ->add('tpFechaCreacion')
            ->add('tpFechaModificacion')
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'hnr\sircimBundle\Entity\TamanoPlaca'
        ));
    }

    public function getName()
    {
        return 'hnr_sircimbundle_tamanoplacatype';
    }
}
