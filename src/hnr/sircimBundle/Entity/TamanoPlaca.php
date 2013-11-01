<?php

namespace hnr\sircimBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TamanoPlaca
 *
 * @ORM\Table(name="tamano_placa")
 * @ORM\Entity
 */
class TamanoPlaca
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="tamano_placa_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="tp_tamano", type="string", length=7, nullable=false)
     */
    private $tpTamano;

    /**
     * @var integer
     *
     * @ORM\Column(name="tp_estado", type="smallint", nullable=false)
     */
    private $tpEstado;

    /**
     * @var string
     *
     * @ORM\Column(name="tp_usuario_creacion", type="string", length=15, nullable=false)
     */
    private $tpUsuarioCreacion;

    /**
     * @var string
     *
     * @ORM\Column(name="tp_usuario_modificacion", type="string", length=15, nullable=true)
     */
    private $tpUsuarioModificacion;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="tp_fecha_creacion", type="datetime", nullable=false)
     */
    private $tpFechaCreacion;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="tp_fecha_modificacion", type="datetime", nullable=true)
     */
    private $tpFechaModificacion;



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
     * Set tpTamano
     *
     * @param string $tpTamano
     * @return TamanoPlaca
     */
    public function setTpTamano($tpTamano)
    {
        $this->tpTamano = $tpTamano;
    
        return $this;
    }

    /**
     * Get tpTamano
     *
     * @return string 
     */
    public function getTpTamano()
    {
        return $this->tpTamano;
    }

    /**
     * Set tpEstado
     *
     * @param integer $tpEstado
     * @return TamanoPlaca
     */
    public function setTpEstado($tpEstado)
    {
        $this->tpEstado = $tpEstado;
    
        return $this;
    }

    /**
     * Get tpEstado
     *
     * @return integer 
     */
    public function getTpEstado()
    {
        return $this->tpEstado;
    }

    /**
     * Set tpUsuarioCreacion
     *
     * @param string $tpUsuarioCreacion
     * @return TamanoPlaca
     */
    public function setTpUsuarioCreacion($tpUsuarioCreacion)
    {
        $this->tpUsuarioCreacion = $tpUsuarioCreacion;
    
        return $this;
    }

    /**
     * Get tpUsuarioCreacion
     *
     * @return string 
     */
    public function getTpUsuarioCreacion()
    {
        return $this->tpUsuarioCreacion;
    }

    /**
     * Set tpUsuarioModificacion
     *
     * @param string $tpUsuarioModificacion
     * @return TamanoPlaca
     */
    public function setTpUsuarioModificacion($tpUsuarioModificacion)
    {
        $this->tpUsuarioModificacion = $tpUsuarioModificacion;
    
        return $this;
    }

    /**
     * Get tpUsuarioModificacion
     *
     * @return string 
     */
    public function getTpUsuarioModificacion()
    {
        return $this->tpUsuarioModificacion;
    }

    /**
     * Set tpFechaCreacion
     *
     * @param \DateTime $tpFechaCreacion
     * @return TamanoPlaca
     */
    public function setTpFechaCreacion($tpFechaCreacion)
    {
        $this->tpFechaCreacion = $tpFechaCreacion;
    
        return $this;
    }

    /**
     * Get tpFechaCreacion
     *
     * @return \DateTime 
     */
    public function getTpFechaCreacion()
    {
        return $this->tpFechaCreacion;
    }

    /**
     * Set tpFechaModificacion
     *
     * @param \DateTime $tpFechaModificacion
     * @return TamanoPlaca
     */
    public function setTpFechaModificacion($tpFechaModificacion)
    {
        $this->tpFechaModificacion = $tpFechaModificacion;
    
        return $this;
    }

    /**
     * Get tpFechaModificacion
     *
     * @return \DateTime 
     */
    public function getTpFechaModificacion()
    {
        return $this->tpFechaModificacion;
    }
    
    public function __toString() {
        return $this->tpTamano;
    }
}