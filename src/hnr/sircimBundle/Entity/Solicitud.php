<?php

namespace hnr\sircimBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Solicitud
 *
 * @ORM\Table(name="solicitud")
 * @ORM\Entity
 */
class Solicitud
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="solicitud_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var integer
     *
     * @ORM\Column(name="so_tipo", type="smallint", nullable=false)
     */
    private $soTipo;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="so_fecha", type="date", nullable=false)
     */
    private $soFecha;

    /**
     * @var string
     *
     * @ORM\Column(name="so_region", type="string", length=50, nullable=false)
     */
    private $soRegion;

    /**
     * @var string
     *
     * @ORM\Column(name="so_posicion", type="text", nullable=false)
     */
    private$soPosicion;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_mnt_expediente", type="bigint", nullable=false)
     */
    private$idMntExpediente;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_mnt_aten_area_mod_estab", type="integer", nullable=true)
     */
    private $idMntAtenAreaModEstab;

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
     * Set soTipo
     *
     * @param integer $soTipo
     * @return Solicitud
     */
    public function setSoTipo($soTipo)
    {
        $this->soTipo = $soTipo;
    
        return $this;
    }

    /**
     * Get soTipo
     *
     * @return integer 
     */
    public function getSoTipo()
    {
        return $this->soTipo;
    }

    /**
     * Set soFecha
     *
     * @param \DateTime $soFecha
     * @return Solicitud
     */
    public function setSoFecha($soFecha)
    {
        $this->soFecha = $soFecha;
    
        return $this;
    }

    /**
     * Get soFecha
     *
     * @return \DateTime 
     */
    public function getSoFecha()
    {
        return $this->soFecha;
    }

    /**
     * Set soRegion
     *
     * @param string $soRegion
     * @return Solicitud
     */
    public function setSoRegion($soRegion)
    {
        $this->soRegion = $soRegion;
    
        return $this;
    }

    /**
     * Get soRegion
     *
     * @return string 
     */
    public function getSoRegion()
    {
        return $this->soRegion;
    }

    /**
     * Set soPosicion
     *
     * @param string $soPosicion
     * @return Solicitud
     */
    public function setSoPosicion($soPosicion)
    {
        $this->soPosicion = $soPosicion;
    
        return $this;
    }

    /**
     * Get soPosicion
     *
     * @return string 
     */
    public function getSoPosicion()
    {
        return $this->soPosicion;
    }

    /**
     * Set idMntExpediente
     *
     * @param integer $idMntExpediente
     * @return Solicitud
     */
    public function setIdMntExpediente($idMntExpediente)
    {
        $this->idMntExpediente = $idMntExpediente;
    
        return $this;
    }

    /**
     * Get idMntExpediente
     *
     * @return integer 
     */
    public function getIdMntExpediente()
    {
        return $this->idMntExpediente;
    }

    /**
     * Set idMntAtenAreaModEstab
     *
     * @param integer $idMntAtenAreaModEstab
     * @return Solicitud
     */
    public function setIdMntAtenAreaModEstab($idMntAtenAreaModEstab)
    {
        $this->idMntAtenAreaModEstab = $idMntAtenAreaModEstab;
    
        return $this;
    }

    /**
     * Get idMntAtenAreaModEstab
     *
     * @return integer 
     */
    public function getIdMntAtenAreaModEstab()
    {
        return $this->idMntAtenAreaModEstab;
    }

    /**
     * @Assert\Type(type="hnr\sircimBundle\Entity\EstudioArea")
     */
    protected $EstudioArea;

    /**
     * Set EstudioArea
     *
     * @param \hnr\sircimBundle\Entity\EstudioArea $EstudioArea
     * @return Solicitud
     */
    public function setEstudioArea(\hnr\sircimBundle\Entity\EstudioArea $EstudioArea = null)
    {
        $this->idEstudioArea = $EstudioArea;
    
        return $this;
    }

    /**
     * Get idEstudioArea
     *
     * @return \hnr\sircimBundle\Entity\EstudioArea 
     */
    public function getEstudioArea()
    {
        return $this->idEstudioArea;
    }
    
    
    public function __toString() {
        return $this->idMntExpediente;
    }
    
}