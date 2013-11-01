<?php

namespace hnr\sircimBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class CitaType extends AbstractType
{
    private $regiones; 
    private $posiciones;
    
    public function __construct($regiones, $posiciones) {
        $this->regiones = $regiones;
        $this->posiciones = $posiciones;
    }
    
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('ciEdadPaciente',null,
                  array('label'     => 'Edad',
                        'read_only' => true,
                       ))
            /*->add('ciEstado',null,
                  array('label' => 'Estado',
                       ))*/
            ->add('idSolicitud', new SolicitudType(1, $this->regiones, $this->posiciones),
                  array('label' => false,
                       ));        
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'hnr\sircimBundle\Entity\Cita'
        ));
    }

    public function getName()
    {
        return 'hnr_sircimbundle_citatype';
    }
}
