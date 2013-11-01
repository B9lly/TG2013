<?php

namespace hnr\sircimBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * EstudioRadTamPlaca
 *
 * @ORM\Table(name="estudio_rad_tam_placa")
 * @ORM\Entity
 */
class EstudioRadTamPlaca
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="estudio_rad_tam_placa_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var integer
     *
     * @ORM\Column(name="ertp_aceptadas", type="smallint", nullable=false)
     */
    private $ertpAceptadas;

    /**
     * @var integer
     *
     * @ORM\Column(name="ertp_descartadas", type="smallint", nullable=false)
     */
    private $ertpDescartadas;

    /**
     * @var \EstudioRadiologico
     *
     * @ORM\ManyToOne(targetEntity="EstudioRadiologico", inversedBy="placas")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_estudio_radiologico", referencedColumnName="id")
     * })
     */
    private $idEstudioRadiologico;

    /**
     * @var \TamanoPlaca
     *
     * @ORM\ManyToOne(targetEntity="TamanoPlaca")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_tamano", referencedColumnName="id")
     * })
     */
    private $idTamano;



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
     * Set ertpAceptadas
     *
     * @param integer $ertpAceptadas
     * @return EstudioRadTamPlaca
     */
    public function setErtpAceptadas($ertpAceptadas)
    {
        $this->ertpAceptadas = $ertpAceptadas;
    
        return $this;
    }

    /**
     * Get ertpAceptadas
     *
     * @return integer 
     */
    public function getErtpAceptadas()
    {
        return $this->ertpAceptadas;
    }

    /**
     * Set ertpDescartadas
     *
     * @param integer $ertpDescartadas
     * @return EstudioRadTamPlaca
     */
    public function setErtpDescartadas($ertpDescartadas)
    {
        $this->ertpDescartadas = $ertpDescartadas;
    
        return $this;
    }

    /**
     * Get ertpDescartadas
     *
     * @return integer 
     */
    public function getErtpDescartadas()
    {
        return $this->ertpDescartadas;
    }

    /**
     * Set idEstudioRadiologico
     *
     * @param \hnr\sircimBundle\Entity\EstudioRadiologico $idEstudioRadiologico
     * @return EstudioRadTamPlaca
     */
    public function setIdEstudioRadiologico(\hnr\sircimBundle\Entity\EstudioRadiologico $idEstudioRadiologico = null)
    {
        $this->idEstudioRadiologico = $idEstudioRadiologico;
    
        return $this;
    }

    /**
     * Get idEstudioRadiologico
     *
     * @return \hnr\sircimBundle\Entity\EstudioRadiologico 
     */
    public function getIdEstudioRadiologico()
    {
        return $this->idEstudioRadiologico;
    }

    /**
     * Set idTamano
     *
     * @param \hnr\sircimBundle\Entity\TamanoPlaca $idTamano
     * @return EstudioRadTamPlaca
     */
    public function setIdTamano(\hnr\sircimBundle\Entity\TamanoPlaca $idTamano = null)
    {
        $this->idTamano = $idTamano;
    
        return $this;
    }

    /**
     * Get idTamano
     *
     * @return \hnr\sircimBundle\Entity\TamanoPlaca 
     */
    public function getIdTamano()
    {
        return $this->idTamano;
    }
    
    public function addEstudioRad(EstudioRadiologico $task){
        setIdEstudioRadiologico($task);
    }
    
}