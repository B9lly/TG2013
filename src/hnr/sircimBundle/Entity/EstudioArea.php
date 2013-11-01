<?php

namespace hnr\sircimBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * EstudioArea
 *
 * @ORM\Table(name="estudio_area")
 * @ORM\Entity(repositoryClass="hnr\sircimBundle\Entity\EstudioAreaRepository")
 */
class EstudioArea
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="estudio_area_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var integer
     *
     * @ORM\Column(name="estado_estudio_area", type="smallint", nullable=false)
     */
    private $estadoEstudioArea;

    

    /**
     * @var \Estudio
     *
     * @ORM\ManyToOne(targetEntity="Estudio",cascade={"persist"})
     * @ORM\JoinColumns({
     * @ORM\JoinColumn(name="id_estudio", referencedColumnName="id")
     * })
     */
    private $idEstudio;

    /**
     * @var \Area
     *
     * @ORM\ManyToOne(targetEntity="Area")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_area", referencedColumnName="id")
     * })
     */
    private $idArea;



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
     * Set estadoEstudioArea
     *
     * @param integer $estadoEstudioArea
     * @return EstudioArea
     */
    public function setEstadoEstudioArea($estadoEstudioArea)
    {
        $this->estadoEstudioArea = $estadoEstudioArea;
    
        return $this;
    }

    /**
     * Get estadoEstudioArea
     *
     * @return integer 
     */
    public function getEstadoEstudioArea()
    {
        return $this->estadoEstudioArea;
    }

    /**
     * Set idEstudio
     *
     * @param \hnr\sircimBundle\Entity\Estudio $idEstudio
     * @return EstudioArea
     */
    public function setIdEstudio(\hnr\sircimBundle\Entity\Estudio $idEstudio = null)
    {
        $this->idEstudio = $idEstudio;
    
        return $this;
    }

    /**
     * Get idEstudio
     *
     * @return \hnr\sircimBundle\Entity\Estudio
     */
    public function getIdEstudio()
    {
        return $this->idEstudio;
    }

    /**
     * Set idArea
     *
     * @param \hnr\sircimBundle\Entity\Area $idArea
     * @return EstudioArea
     */
    public function setIdArea(\hnr\sircimBundle\Entity\Area $idArea = null)
    {
        $this->idArea = $idArea;
    
        return $this;
    }

    /**
     * Get idArea
     *
     * @return \hnr\sircimBundle\Entity\Area 
     */
    public function getIdArea()
    {
        return $this->idArea;
    }

    public function __toString(){
        return $this->idEstudio;
    }


    /**
     * @Assert\Type(type="hnr\sircimBundle\Entity\Estudio")
     */
    protected $estudio;

    /**
     * Set estudio
     *
     * @param \hnr\sircimBundle\Entity\Estudio $estudio
     * @return Estudio
     */
    public function setestudio(\hnr\sircimBundle\Entity\Estudio $estudio = null)
    {
        $this->idEstudio = $estudio;
    
        return $this;
    }

    /**
     * Get idEstudio
     *
     * @return \hnr\sircimBundle\Entity\Estudio
     */
    public function getestudio()
    {
        return $this->idEstudio;
    }

    /**
     * @Assert\Type(type="hnr\sircimBundle\Entity\Estudio")
     */
    public $uscreacion;

    /**
     * Set uscreacion
     *
     * @param \hnr\sircimBundle\Entity\Estudio $uscreacion
     * @return Estudio
     */
    // public function setuscreacion(\hnr\sircimBundle\Entity\Estudio $uscreacion = null)
    // {
    //     $this->uscreacion = $uscreacion;
    
    //     return $this;
    // }

    /**
     * Get uscreacion
     *
     * @return \hnr\sircimBundle\Entity\Estudio
     */
    public function getuscreacion()
    {
        return $this->uscreacion;
    }

}