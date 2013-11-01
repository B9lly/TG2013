<?php

namespace hnr\sircimBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Area
 *
 * @ORM\Table(name="area")
 * @ORM\Entity
 */
class Area
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="area_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="ar_nombre", type="string", length=30, nullable=false)
     */
    private $arNombre;

    /**
     * @var string
     *
     * @ORM\Column(name="ar_descripcion", type="string", length=100, nullable=false)
     */
    private $arDescripcion;

    /**
     * @var integer
     *
     * @ORM\Column(name="ar_cupo", type="smallint", nullable=true)
     */
    private $arCupo;

    /**
     * @var integer
     *
     * @ORM\Column(name="ar_estado_cupo", type="smallint", nullable=false)
     */
    private $arEstadoCupo;

    /**
     * @var integer
     *
     * @ORM\Column(name="ar_estado", type="smallint", nullable=false)
     */
    private $arEstado;

    /**
     * @var string
     *
     * @ORM\Column(name="ar_usuario_creacion", type="string", length=15, nullable=false)
     */
    private $arUsuarioCreacion;

    /**
     * @var string
     *
     * @ORM\Column(name="ar_usuario_modificacion", type="string", length=15, nullable=true)
     */
    private $arUsuarioModificacion;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="ar_fecha_creacion", type="datetime", nullable=false)
     */
    private $arFechaCreacion;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="ar_fecha_modificacion", type="datetime", nullable=true)
     */
    private $arFechaModificacion;



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
     * Set arNombre
     *
     * @param string $arNombre
     * @return Area
     */
    public function setArNombre($arNombre)
    {
        $this->arNombre = $arNombre;
    
        return $this;
    }

    /**
     * Get arNombre
     *
     * @return string 
     */
    public function getArNombre()
    {
        return $this->arNombre;
    }

    /**
     * Set arDescripcion
     *
     * @param string $arDescripcion
     * @return Area
     */
    public function setArDescripcion($arDescripcion)
    {
        $this->arDescripcion = $arDescripcion;
    
        return $this;
    }

    /**
     * Get arDescripcion
     *
     * @return string 
     */
    public function getArDescripcion()
    {
        return $this->arDescripcion;
    }

    /**
     * Set arCupo
     *
     * @param integer $arCupo
     * @return Area
     */
    public function setArCupo($arCupo)
    {
        $this->arCupo = $arCupo;
    
        return $this;
    }

    /**
     * Get arCupo
     *
     * @return integer 
     */
    public function getArCupo()
    {
        return $this->arCupo;
    }

    /**
     * Set arEstadoCupo
     *
     * @param integer $arEstadoCupo
     * @return Area
     */
    public function setArEstadoCupo($arEstadoCupo)
    {
        $this->arEstadoCupo = $arEstadoCupo;
    
        return $this;
    }

    /**
     * Get arEstadoCupo
     *
     * @return integer 
     */
    public function getArEstadoCupo()
    {
        return $this->arEstadoCupo;
    }

    /**
     * Set arEstado
     *
     * @param integer $arEstado
     * @return Area
     */
    public function setArEstado($arEstado)
    {
        $this->arEstado = $arEstado;
    
        return $this;
    }

    /**
     * Get arEstado
     *
     * @return integer 
     */
    public function getArEstado()
    {
        return $this->arEstado;
    }

    /**
     * Set arUsuarioCreacion
     *
     * @param string $arUsuarioCreacion
     * @return Area
     */
    public function setArUsuarioCreacion($arUsuarioCreacion)
    {
        $this->arUsuarioCreacion = $arUsuarioCreacion;
    
        return $this;
    }

    /**
     * Get arUsuarioCreacion
     *
     * @return string 
     */
    public function getArUsuarioCreacion()
    {
        return $this->arUsuarioCreacion;
    }

    /**
     * Set arUsuarioModificacion
     *
     * @param string $arUsuarioModificacion
     * @return Area
     */
    public function setArUsuarioModificacion($arUsuarioModificacion)
    {
        $this->arUsuarioModificacion = $arUsuarioModificacion;
    
        return $this;
    }

    /**
     * Get arUsuarioModificacion
     *
     * @return string 
     */
    public function getArUsuarioModificacion()
    {
        return $this->arUsuarioModificacion;
    }

    /**
     * Set arFechaCreacion
     *
     * @param \DateTime $arFechaCreacion
     * @return Area
     */
    public function setArFechaCreacion($arFechaCreacion)
    {
        $this->arFechaCreacion = $arFechaCreacion;
    
        return $this;
    }

    /**
     * Get arFechaCreacion
     *
     * @return \DateTime 
     */
    public function getArFechaCreacion()
    {
        return $this->arFechaCreacion;
    }

    /**
     * Set arFechaModificacion
     *
     * @param \DateTime $arFechaModificacion
     * @return Area
     */
    public function setArFechaModificacion($arFechaModificacion)
    {
        $this->arFechaModificacion = $arFechaModificacion;
    
        return $this;
    }

    /**
     * Get arFechaModificacion
     *
     * @return \DateTime 
     */
    public function getArFechaModificacion()
    {
        return $this->arFechaModificacion;
    }
    
    public function __toString() {
      return $this->arNombre;
    }
}