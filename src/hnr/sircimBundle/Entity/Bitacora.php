<?php

namespace hnr\sircimBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Bitacora
 *
 * @ORM\Table(name="bitacora")
 * @ORM\Entity
 */
class Bitacora
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="bitacora_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="bi_accion", type="string", length=50, nullable=false)
     */
    private $biAccion;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="bi_fecha", type="datetime", nullable=false)
     */
    private $biFecha;

    /**
     * @var \Usuario
     *
     * @ORM\ManyToOne(targetEntity="Usuario")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_usuario", referencedColumnName="id")
     * })
     */
    private $idUsuario;



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
     * Set biAccion
     *
     * @param string $biAccion
     * @return Bitacora
     */
    public function setBiAccion($biAccion)
    {
        $this->biAccion = $biAccion;
    
        return $this;
    }

    /**
     * Get biAccion
     *
     * @return string 
     */
    public function getBiAccion()
    {
        return $this->biAccion;
    }

    /**
     * Set biFecha
     *
     * @param \DateTime $biFecha
     * @return Bitacora
     */
    public function setBiFecha($biFecha)
    {
        $this->biFecha = $biFecha;
    
        return $this;
    }

    /**
     * Get biFecha
     *
     * @return \DateTime 
     */
    public function getBiFecha()
    {
        return $this->biFecha;
    }

    /**
     * Set idUsuario
     *
     * @param \hnr\sircimBundle\Entity\Usuario $idUsuario
     * @return Bitacora
     */
    public function setIdUsuario(\hnr\sircimBundle\Entity\Usuario $idUsuario = null)
    {
        $this->idUsuario = $idUsuario;
    
        return $this;
    }

    /**
     * Get idUsuario
     *
     * @return \hnr\sircimBundle\Entity\Usuario 
     */
    public function getIdUsuario()
    {
        return $this->idUsuario;
    }
}