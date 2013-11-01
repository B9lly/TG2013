<?php

namespace hnr\sircimBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Horario
 *
 * @ORM\Table(name="horario")
 * @ORM\Entity
 */
class Horario
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="horario_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="ho_dia", type="string", length=9, nullable=false)
     */
    private $hoDia;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="ho_hora_inicio", type="time", nullable=false)
     */
    private $hoHoraInicio;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="ho_hora_fin", type="time", nullable=false)
     */
    private $hoHoraFin;

    /**
     * @var \EstudioArea
     *
     * @ORM\ManyToOne(targetEntity="EstudioArea")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_estudio_area", referencedColumnName="id")
     * })
     */
    private $idEstudioArea;



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
     * Set hoDia
     *
     * @param string $hoDia
     * @return Horario
     */
    public function setHoDia($hoDia)
    {
        $this->hoDia = $hoDia;
    
        return $this;
    }

    /**
     * Get hoDia
     *
     * @return string 
     */
    public function getHoDia()
    {
        return $this->hoDia;
    }

    /**
     * Set hoHoraInicio
     *
     * @param \DateTime $hoHoraInicio
     * @return Horario
     */
    public function setHoHoraInicio($hoHoraInicio)
    {
        $this->hoHoraInicio = $hoHoraInicio;
    
        return $this;
    }

    /**
     * Get hoHoraInicio
     *
     * @return \DateTime 
     */
    public function getHoHoraInicio()
    {
        return $this->hoHoraInicio;
    }

    /**
     * Set hoHoraFin
     *
     * @param \DateTime $hoHoraFin
     * @return Horario
     */
    public function setHoHoraFin($hoHoraFin)
    {
        $this->hoHoraFin = $hoHoraFin;
    
        return $this;
    }

    /**
     * Get hoHoraFin
     *
     * @return \DateTime 
     */
    public function getHoHoraFin()
    {
        return $this->hoHoraFin;
    }

    /**
     * Set idEstudioArea
     *
     * @param \hnr\sircimBundle\Entity\EstudioArea $idEstudioArea
     * @return Horario
     */
    public function setIdEstudioArea(\hnr\sircimBundle\Entity\EstudioArea $idEstudioArea = null)
    {
        $this->idEstudioArea = $idEstudioArea;
    
        return $this;
    }

    /**
     * Get idEstudioArea
     *
     * @return \hnr\sircimBundle\Entity\EstudioArea 
     */
    public function getIdEstudioArea()
    {
        return $this->idEstudioArea;
    }
}