<?php

namespace hnr\sircimBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class EstudioRadiologicoType extends AbstractType
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
            ->add('erEdadPaciente')
            ->add('idempleado')
            ->add('idSolicitud', new SolicitudType(1, $this->regiones, $this->posiciones))
            ->add('placas', 'collection', array(
                  'type'        => new EstudioRadTamPlacaType(),
                  'allow_add'   => true,
                  'allow_delete'=> true,
                  'by_reference'=> false,
                  ));
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'hnr\sircimBundle\Entity\EstudioRadiologico'
        ));
    }

    public function getName()
    {
        return 'hnr_sircimbundle_estudioradiologicotype';
    }
}
