<?php

namespace hnr\sircimBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class EstudioType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder

            ->add('esNombre','text',array('label'=>'Nombre del estudio'))
            ->add('esAbreviatura','text',array('label'=>'Abreviatura'))
            ->add('esTipo','text',array('label'=>'Tipo de estudio'))
            ->add('esDescripcion','text',array('label'=>'Descripción'))
            //->add('idestudio',new EstudioAreaType(),array('label'=>' '))
            /*->add('esUsuarioCreacion')
            ->add('esUsuarioModificacion')
            ->add('esFechaCreacion')
            ->add('esFechaModificacion')*/
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'hnr\sircimBundle\Entity\Estudio'
        ));
    }

    public function getName()
    {
        return 'hnr_sircimbundle_estudiotype';
    }
}
