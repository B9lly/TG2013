<?php

namespace hnr\sircimBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class EstudioRadTamPlacaType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('ertpAceptadas')
            ->add('ertpDescartadas')
            /*->add('idEstudioRadiologico')*/
            ->add('idTamano')
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'hnr\sircimBundle\Entity\EstudioRadTamPlaca'
        ));
    }

    public function getName()
    {
        return 'hnr_sircimbundle_estudioradtamplacatype';
    }
}
