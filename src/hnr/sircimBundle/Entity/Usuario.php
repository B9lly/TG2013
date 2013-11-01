<?php

namespace hnr\sircimBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Usuario
 *
 * @ORM\Table(name="usuario")
 * @ORM\Entity
 */
class Usuario
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="usuario_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="us_login", type="string", length=15, nullable=false)
     */
    private $usLogin;

    /**
     * @var string
     *
     * @ORM\Column(name="us_correo", type="text", nullable=false)
     */
    private $usCorreo;

    /**
     * @var string
     *
     * @ORM\Column(name="us_contrasena", type="string", length=128, nullable=false)
     */
    private $usContrasena;

    /**
     * @var integer
     *
     * @ORM\Column(name="us_actualizar_contrasena", type="smallint", nullable=false)
     */
    private $usActualizarContrasena;

    /**
     * @var integer
     *
     * @ORM\Column(name="us_estado_activo", type="smallint", nullable=false)
     */
    private $usEstadoActivo;

    /**
     * @var integer
     *
     * @ORM\Column(name="us_estado_bloqueado", type="smallint", nullable=false)
     */
    private $usEstadoBloqueado;

    /**
     * @var string
     *
     * @ORM\Column(name="idempleado", type="string", length=7, nullable=false)
     */
    private $idempleado;

    /**
     * @var string
     *
     * @ORM\Column(name="us_usuario_creacion", type="string", length=15, nullable=false)
     */
    private $usUsuarioCreacion;

    /**
     * @var string
     *
     * @ORM\Column(name="us_usuario_modificacion", type="string", length=15, nullable=true)
     */
    private $usUsuarioModificacion;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="us_fecha_creacion", type="datetime", nullable=false)
     */
    private $usFechaCreacion;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="us_fecha_modificacion", type="datetime", nullable=true)
     */
    private $usFechaModificacion;



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
     * Set usLogin
     *
     * @param string $usLogin
     * @return Usuario
     */
    public function setUsLogin($usLogin)
    {
        $this->usLogin = $usLogin;
    
        return $this;
    }

    /**
     * Get usLogin
     *
     * @return string 
     */
    public function getUsLogin()
    {
        return $this->usLogin;
    }

    /**
     * Set usCorreo
     *
     * @param string $usCorreo
     * @return Usuario
     */
    public function setUsCorreo($usCorreo)
    {
        $this->usCorreo = $usCorreo;
    
        return $this;
    }

    /**
     * Get usCorreo
     *
     * @return string 
     */
    public function getUsCorreo()
    {
        return $this->usCorreo;
    }

    /**
     * Set usContrasena
     *
     * @param string $usContrasena
     * @return Usuario
     */
    public function setUsContrasena($usContrasena)
    {
        $this->usContrasena = $usContrasena;
    
        return $this;
    }

    /**
     * Get usContrasena
     *
     * @return string 
     */
    public function getUsContrasena()
    {
        return $this->usContrasena;
    }

    /**
     * Set usActualizarContrasena
     *
     * @param integer $usActualizarContrasena
     * @return Usuario
     */
    public function setUsActualizarContrasena($usActualizarContrasena)
    {
        $this->usActualizarContrasena = $usActualizarContrasena;
    
        return $this;
    }

    /**
     * Get usActualizarContrasena
     *
     * @return integer 
     */
    public function getUsActualizarContrasena()
    {
        return $this->usActualizarContrasena;
    }

    /**
     * Set usEstadoActivo
     *
     * @param integer $usEstadoActivo
     * @return Usuario
     */
    public function setUsEstadoActivo($usEstadoActivo)
    {
        $this->usEstadoActivo = $usEstadoActivo;
    
        return $this;
    }

    /**
     * Get usEstadoActivo
     *
     * @return integer 
     */
    public function getUsEstadoActivo()
    {
        return $this->usEstadoActivo;
    }

    /**
     * Set usEstadoBloqueado
     *
     * @param integer $usEstadoBloqueado
     * @return Usuario
     */
    public function setUsEstadoBloqueado($usEstadoBloqueado)
    {
        $this->usEstadoBloqueado = $usEstadoBloqueado;
    
        return $this;
    }

    /**
     * Get usEstadoBloqueado
     *
     * @return integer 
     */
    public function getUsEstadoBloqueado()
    {
        return $this->usEstadoBloqueado;
    }

    /**
     * Set idempleado
     *
     * @param string $idempleado
     * @return Usuario
     */
    public function setIdempleado($idempleado)
    {
        $this->idempleado = $idempleado;
    
        return $this;
    }

    /**
     * Get idempleado
     *
     * @return string 
     */
    public function getIdempleado()
    {
        return $this->idempleado;
    }

    /**
     * Set usUsuarioCreacion
     *
     * @param string $usUsuarioCreacion
     * @return Usuario
     */
    public function setUsUsuarioCreacion($usUsuarioCreacion)
    {
        $this->usUsuarioCreacion = $usUsuarioCreacion;
    
        return $this;
    }

    /**
     * Get usUsuarioCreacion
     *
     * @return string 
     */
    public function getUsUsuarioCreacion()
    {
        return $this->usUsuarioCreacion;
    }

    /**
     * Set usUsuarioModificacion
     *
     * @param string $usUsuarioModificacion
     * @return Usuario
     */
    public function setUsUsuarioModificacion($usUsuarioModificacion)
    {
        $this->usUsuarioModificacion = $usUsuarioModificacion;
    
        return $this;
    }

    /**
     * Get usUsuarioModificacion
     *
     * @return string 
     */
    public function getUsUsuarioModificacion()
    {
        return $this->usUsuarioModificacion;
    }

    /**
     * Set usFechaCreacion
     *
     * @param \DateTime $usFechaCreacion
     * @return Usuario
     */
    public function setUsFechaCreacion($usFechaCreacion)
    {
        $this->usFechaCreacion = $usFechaCreacion;
    
        return $this;
    }

    /**
     * Get usFechaCreacion
     *
     * @return \DateTime 
     */
    public function getUsFechaCreacion()
    {
        return $this->usFechaCreacion;
    }

    /**
     * Set usFechaModificacion
     *
     * @param \DateTime $usFechaModificacion
     * @return Usuario
     */
    public function setUsFechaModificacion($usFechaModificacion)
    {
        $this->usFechaModificacion = $usFechaModificacion;
    
        return $this;
    }

    /**
     * Get usFechaModificacion
     *
     * @return \DateTime 
     */
    public function getUsFechaModificacion()
    {
        return $this->usFechaModificacion;
    }
}