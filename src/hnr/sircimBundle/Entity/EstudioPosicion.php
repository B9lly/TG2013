<?php

namespace hnr\sircimBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * EstudioPosicion
 *
 * @ORM\Table(name="estudio_posicion")
 * @ORM\Entity
 */
class EstudioPosicion
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="estudio_posicion_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var \Estudio
     *
     * @ORM\ManyToOne(targetEntity="Estudio")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_estudio", referencedColumnName="id")
     * })
     */
    private $idEstudio;

    /**
     * @var \Posicion
     *
     * @ORM\ManyToOne(targetEntity="Posicion")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_posicion", referencedColumnName="id")
     * })
     */
    private $idPosicion;



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
     * Set idEstudio
     *
     * @param \hnr\sircimBundle\Entity\Estudio $idEstudio
     * @return EstudioPosicion
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
     * Set idPosicion
     *
     * @param \hnr\sircimBundle\Entity\Posicion $idPosicion
     * @return EstudioPosicion
     */
    public function setIdPosicion(\hnr\sircimBundle\Entity\Posicion $idPosicion = null)
    {
        $this->idPosicion = $idPosicion;
    
        return $this;
    }

    /**
     * Get idPosicion
     *
     * @return \hnr\sircimBundle\Entity\Posicion 
     */
    public function getIdPosicion()
    {
        return $this->idPosicion;
    }
}