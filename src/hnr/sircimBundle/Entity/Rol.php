<?php

namespace hnr\sircimBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Rol
 *
 * @ORM\Table(name="rol")
 * @ORM\Entity
 */
class Rol
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="rol_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="ro_nombre", type="string", length=50, nullable=false)
     */
    private $roNombre;

    /**
     * @var string
     *
     * @ORM\Column(name="ro_descripcion", type="string", length=100, nullable=false)
     */
    private $roDescripcion;

    /**
     * @var integer
     *
     * @ORM\Column(name="ro_modificable", type="smallint", nullable=false)
     */
    private $roModificable;

    /**
     * @var integer
     *
     * @ORM\Column(name="ro_estado", type="smallint", nullable=false)
     */
    private $roEstado;

    /**
     * @var string
     *
     * @ORM\Column(name="ro_usuario_creacion", type="string", length=15, nullable=false)
     */
    private $roUsuarioCreacion;

    /**
     * @var string
     *
     * @ORM\Column(name="ro_usuario_modificacion", type="string", length=15, nullable=true)
     */
    private $roUsuarioModificacion;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="ro_fecha_creacion", type="datetime", nullable=false)
     */
    private $roFechaCreacion;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="ro_fecha_modificacion", type="datetime", nullable=true)
     */
    private $roFechaModificacion;



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
     * Set roNombre
     *
     * @param string $roNombre
     * @return Rol
     */
    public function setRoNombre($roNombre)
    {
        $this->roNombre = $roNombre;
    
        return $this;
    }

    /**
     * Get roNombre
     *
     * @return string 
     */
    public function getRoNombre()
    {
        return $this->roNombre;
    }

    /**
     * Set roDescripcion
     *
     * @param string $roDescripcion
     * @return Rol
     */
    public function setRoDescripcion($roDescripcion)
    {
        $this->roDescripcion = $roDescripcion;
    
        return $this;
    }

    /**
     * Get roDescripcion
     *
     * @return string 
     */
    public function getRoDescripcion()
    {
        return $this->roDescripcion;
    }

    /**
     * Set roModificable
     *
     * @param integer $roModificable
     * @return Rol
     */
    public function setRoModificable($roModificable)
    {
        $this->roModificable = $roModificable;
    
        return $this;
    }

    /**
     * Get roModificable
     *
     * @return integer 
     */
    public function getRoModificable()
    {
        return $this->roModificable;
    }

    /**
     * Set roEstado
     *
     * @param integer $roEstado
     * @return Rol
     */
    public function setRoEstado($roEstado)
    {
        $this->roEstado = $roEstado;
    
        return $this;
    }

    /**
     * Get roEstado
     *
     * @return integer 
     */
    public function getRoEstado()
    {
        return $this->roEstado;
    }

    /**
     * Set roUsuarioCreacion
     *
     * @param string $roUsuarioCreacion
     * @return Rol
     */
    public function setRoUsuarioCreacion($roUsuarioCreacion)
    {
        $this->roUsuarioCreacion = $roUsuarioCreacion;
    
        return $this;
    }

    /**
     * Get roUsuarioCreacion
     *
     * @return string 
     */
    public function getRoUsuarioCreacion()
    {
        return $this->roUsuarioCreacion;
    }

    /**
     * Set roUsuarioModificacion
     *
     * @param string $roUsuarioModificacion
     * @return Rol
     */
    public function setRoUsuarioModificacion($roUsuarioModificacion)
    {
        $this->roUsuarioModificacion = $roUsuarioModificacion;
    
        return $this;
    }

    /**
     * Get roUsuarioModificacion
     *
     * @return string 
     */
    public function getRoUsuarioModificacion()
    {
        return $this->roUsuarioModificacion;
    }

    /**
     * Set roFechaCreacion
     *
     * @param \DateTime $roFechaCreacion
     * @return Rol
     */
    public function setRoFechaCreacion($roFechaCreacion)
    {
        $this->roFechaCreacion = $roFechaCreacion;
    
        return $this;
    }

    /**
     * Get roFechaCreacion
     *
     * @return \DateTime 
     */
    public function getRoFechaCreacion()
    {
        return $this->roFechaCreacion;
    }

    /**
     * Set roFechaModificacion
     *
     * @param \DateTime $roFechaModificacion
     * @return Rol
     */
    public function setRoFechaModificacion($roFechaModificacion)
    {
        $this->roFechaModificacion = $roFechaModificacion;
    
        return $this;
    }

    /**
     * Get roFechaModificacion
     *
     * @return \DateTime 
     */
    public function getRoFechaModificacion()
    {
        return $this->roFechaModificacion;
    }
}