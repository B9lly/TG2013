<?php

namespace hnr\sircimBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use hnr\sircimBundle\Entity\EstudioAreaRepository;
use hnr\sircimBundle\Entity\RegionRepository;


class SolicitudType extends AbstractType
{
    private $postIdArea;
    private $regiones;
    private $posiciones;

    public function __construct($postIdArea = null, $regiones, $posiciones)
    {
        $this->postIdArea = $postIdArea;
        $this->regiones = $regiones;
        $this->posiciones = $posiciones;
    }     
    
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $idprueba = $this->postIdArea;
      
        
        $builder
            //->add('soTipo')
            ->add('soFecha',null,
                  array('label' => 'Fecha'                    
                       ))
            ->add('idMntExpediente',null,
                  array('label' => 'Registro'                    
                       ))
            ->add('Nombre','text',
                  array('mapped'    => false,
                        'required'  => false,
                        'read_only' => true,
                       ))
            ->add('idMntAtenAreaModEstab',null,
                  array('label' => 'Servicio'                    
                       ))
            ->add('EstudioArea', 'entity', 
                  array( 'label'         => 'Estudio',
                         'empty_value'   => 'Seleccione...',
                         'class'         => 'hnrsircimBundle:EstudioArea',
                         'property'      => 'idestudio',
                         'query_builder' => function(EstudioAreaRepository $r) use ($idprueba){
                                            $r->idArea=$idprueba;
                                            return $r->getEstudios();
                                            },
                       ))
            ->add('soRegion', 'choice', 
                  array( 'label'       => 'Región',
                         'empty_value' => 'Seleccione...',
                         'choices'     => $this->regiones,
                       ))
            ->add('soPosicion', 'choice',
                  array( 'label'       => 'Posición',
                         'empty_value' => 'Seleccione...',
                         'choices'     => $this->posiciones,
                       ));        
                         
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'hnr\sircimBundle\Entity\Solicitud',
            'cascade_validation' => true,
        ));
    }

    public function getName()
    {
        return 'hnr_sircimbundle_solicitudtype';
    }
    
    public function getRegiones(){
        
        $children = $this->doctrine->getRepository('hnrsircimBundle:Region')->findAll();

        return $children;
    }
}
