<?php

namespace hnr\sircimBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class RegionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('reNombre')
            ->add('reUsuarioCreacion')
            ->add('reUsuarioModificacion')
            ->add('reFechaCreacion')
            ->add('reFechaModificacion')
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'hnr\sircimBundle\Entity\Region'
        ));
    }

    public function getName()
    {
        return 'hnr_sircimbundle_regiontype';
    }
}
