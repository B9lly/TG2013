<?php

namespace hnr\sircimBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * UsuarioRol
 *
 * @ORM\Table(name="usuario_rol")
 * @ORM\Entity
 */
class UsuarioRol
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="usuario_rol_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var integer
     *
     * @ORM\Column(name="usro_predeterminado", type="smallint", nullable=true)
     */
    private $usroPredeterminado;

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
     * @var \Rol
     *
     * @ORM\ManyToOne(targetEntity="Rol")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_rol", referencedColumnName="id")
     * })
     */
    private $idRol;



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
     * Set usroPredeterminado
     *
     * @param integer $usroPredeterminado
     * @return UsuarioRol
     */
    public function setUsroPredeterminado($usroPredeterminado)
    {
        $this->usroPredeterminado = $usroPredeterminado;
    
        return $this;
    }

    /**
     * Get usroPredeterminado
     *
     * @return integer 
     */
    public function getUsroPredeterminado()
    {
        return $this->usroPredeterminado;
    }

    /**
     * Set idUsuario
     *
     * @param \hnr\sircimBundle\Entity\Usuario $idUsuario
     * @return UsuarioRol
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

    /**
     * Set idRol
     *
     * @param \hnr\sircimBundle\Entity\Rol $idRol
     * @return UsuarioRol
     */
    public function setIdRol(\hnr\sircimBundle\Entity\Rol $idRol = null)
    {
        $this->idRol = $idRol;
    
        return $this;
    }

    /**
     * Get idRol
     *
     * @return \hnr\sircimBundle\Entity\Rol 
     */
    public function getIdRol()
    {
        return $this->idRol;
    }
}