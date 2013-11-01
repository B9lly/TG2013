<?php

namespace hnr\sircimBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;
/**
 * EstudioRadiologico
 *
 * @ORM\Table(name="estudio_radiologico")
 * @ORM\Entity
 */
class EstudioRadiologico
{

    /**
     * @ORM\OneToMany(targetEntity="EstudioRadTamPlaca", mappedBy="idEstudioRadiologico", cascade={"persist"})
     */
    protected $placas;

    public function __construct()
    {
        $this->placas = new ArrayCollection();
        // $this->placas = new ArrayCollection();
    }           

    public function getPlacas()
    {
        return $this->placas;
    }

    public function setPlacas(\Doctrine\Common\Collections\Collection $placas)
    {
        $this->placas = $placas;
        
        foreach ($placas as $Placa) {
            $Placa->setIdEstudioRadiologico($this);
        }
    }
       

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="estudio_radiologico_id_seq", allocationSize=1, initialValue=1)
     * @ORM\OneToMany(targetEntity="hnr\sircimBundle\Entity\EstudioRadTamPlaca", mappedBy="idEstudioRadiologico", cascade={"persist", "remove"})
     */
    private $id;

    /**
     * @var integer
     *
     * @ORM\Column(name="er_edad_paciente", type="smallint", nullable=false)
     */
    private $erEdadPaciente;

    /**
     * @var string
     *
     * @ORM\Column(name="idempleado", type="string", length=7, nullable=false)
     */
    private $idempleado;

    /**
     * @var \Solicitud
     *
     * @ORM\ManyToOne(targetEntity="Solicitud", cascade={"persist", "remove"})
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_solicitud", referencedColumnName="id")
     * })
     */
    private $idSolicitud;



    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set erEdadPaciente
     *
     * @param integer $erEdadPaciente
     * @return EstudioRadiologico
     */
    public function setErEdadPaciente($erEdadPaciente)
    {
        $this->erEdadPaciente = $erEdadPaciente;
    
        return $this;
    }

    /**
     * Get erEdadPaciente
     *
     * @return integer 
     */
    public function getErEdadPaciente()
    {
        return $this->erEdadPaciente;
    }

    /**
     * Set idempleado
     *
     * @param string $idempleado
     * @return EstudioRadiologico
     */
    public function setIdempleado($idempleado)
    {
        $this->idempleado = $idempleado;
    
        return $this;
    }

    /**
     * Get idempleado
     *
     * @return string 
     */
    public function getIdempleado()
    {
        return $this->idempleado;
    }

    /**
     * Set idSolicitud
     *
     * @param \hnr\sircimBundle\Entity\Solicitud $idSolicitud
     * @return EstudioRadiologico
     */
    public function setIdSolicitud(\hnr\sircimBundle\Entity\Solicitud $idSolicitud = null)
    {
        $this->idSolicitud = $idSolicitud;
    
        return $this;
    }

    /**
     * Get idSolicitud
     *
     * @return \hnr\sircimBundle\Entity\Solicitud 
     */
    public function getIdSolicitud()
    {
        return $this->idSolicitud;
    }
    
    
    
    /*public function __toString() {
        return $this->id."";
    }*/
}