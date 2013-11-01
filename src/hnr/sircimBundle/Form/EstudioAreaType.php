<?php

namespace hnr\sircimBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class EstudioAreaType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('estudio',new EstudioType(),array('label'=>' '))
            ->add('estadoEstudioArea')
            ->add('idArea')
            

        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'hnr\sircimBundle\Entity\EstudioArea',
            'cascade_validation' => true,
        ));
    }

    public function getName()
    {
        return 'hnr_sircimbundle_estudioareatype';
    }
}
