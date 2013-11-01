<?php

namespace hnr\sircimBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Region
 *
 * @ORM\Table(name="region")
 * @ORM\Entity(repositoryClass="hnr\sircimBundle\Entity\RegionRepository")
 */
class Region
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="region_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="re_nombre", type="string", length=50, nullable=false)
     */
    private $reNombre;

    /**
     * @var string
     *
     * @ORM\Column(name="re_usuario_creacion", type="string", length=15, nullable=false)
     */
    private $reUsuarioCreacion;

    /**
     * @var string
     *
     * @ORM\Column(name="re_usuario_modificacion", type="string", length=15, nullable=true)
     */
    private $reUsuarioModificacion;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="re_fecha_creacion", type="datetime", nullable=false)
     */
    private $reFechaCreacion;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="re_fecha_modificacion", type="datetime", nullable=true)
     */
    private $reFechaModificacion;



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
     * Set reNombre
     *
     * @param string $reNombre
     * @return Region
     */
    public function setReNombre($reNombre)
    {
        $this->reNombre = $reNombre;
    
        return $this;
    }

    /**
     * Get reNombre
     *
     * @return string 
     */
    public function getReNombre()
    {
        return $this->reNombre;
    }

    /**
     * Set reUsuarioCreacion
     *
     * @param string $reUsuarioCreacion
     * @return Region
     */
    public function setReUsuarioCreacion($reUsuarioCreacion)
    {
        $this->reUsuarioCreacion = $reUsuarioCreacion;
    
        return $this;
    }

    /**
     * Get reUsuarioCreacion
     *
     * @return string 
     */
    public function getReUsuarioCreacion()
    {
        return $this->reUsuarioCreacion;
    }

    /**
     * Set reUsuarioModificacion
     *
     * @param string $reUsuarioModificacion
     * @return Region
     */
    public function setReUsuarioModificacion($reUsuarioModificacion)
    {
        $this->reUsuarioModificacion = $reUsuarioModificacion;
    
        return $this;
    }

    /**
     * Get reUsuarioModificacion
     *
     * @return string 
     */
    public function getReUsuarioModificacion()
    {
        return $this->reUsuarioModificacion;
    }

    /**
     * Set reFechaCreacion
     *
     * @param \DateTime $reFechaCreacion
     * @return Region
     */
    public function setReFechaCreacion($reFechaCreacion)
    {
        $this->reFechaCreacion = $reFechaCreacion;
    
        return $this;
    }

    /**
     * Get reFechaCreacion
     *
     * @return \DateTime 
     */
    public function getReFechaCreacion()
    {
        return $this->reFechaCreacion;
    }

    /**
     * Set reFechaModificacion
     *
     * @param \DateTime $reFechaModificacion
     * @return Region
     */
    public function setReFechaModificacion($reFechaModificacion)
    {
        $this->reFechaModificacion = $reFechaModificacion;
    
        return $this;
    }

    /**
     * Get reFechaModificacion
     *
     * @return \DateTime 
     */
    public function getReFechaModificacion()
    {
        return $this->reFechaModificacion;
    }
}