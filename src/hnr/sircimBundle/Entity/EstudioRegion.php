<?php

namespace hnr\sircimBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * EstudioRegion
 *
 * @ORM\Table(name="estudio_region")
 * @ORM\Entity
 */
class EstudioRegion
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="estudio_region_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var \Region
     *
     * @ORM\ManyToOne(targetEntity="Region")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_region", referencedColumnName="id")
     * })
     */
    private $idRegion;

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
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set idRegion
     *
     * @param \hnr\sircimBundle\Entity\Region $idRegion
     * @return EstudioRegion
     */
    public function setIdRegion(\hnr\sircimBundle\Entity\Region $idRegion = null)
    {
        $this->idRegion = $idRegion;
    
        return $this;
    }

    /**
     * Get idRegion
     *
     * @return \hnr\sircimBundle\Entity\Region 
     */
    public function getIdRegion()
    {
        return $this->idRegion;
    }

    /**
     * Set idEstudio
     *
     * @param \hnr\sircimBundle\Entity\Estudio $idEstudio
     * @return EstudioRegion
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
}