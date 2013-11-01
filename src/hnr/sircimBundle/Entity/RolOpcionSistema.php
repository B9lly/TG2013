<?php

namespace hnr\sircimBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * RolOpcionSistema
 *
 * @ORM\Table(name="rol_opcion_sistema")
 * @ORM\Entity
 */
class RolOpcionSistema
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="rol_opcion_sistema_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

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
     * @var \OpcionSistema
     *
     * @ORM\ManyToOne(targetEntity="OpcionSistema")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_opcion_sistema", referencedColumnName="id")
     * })
     */
    private $idOpcionSistema;



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
     * Set idRol
     *
     * @param \hnr\sircimBundle\Entity\Rol $idRol
     * @return RolOpcionSistema
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

    /**
     * Set idOpcionSistema
     *
     * @param \hnr\sircimBundle\Entity\OpcionSistema $idOpcionSistema
     * @return RolOpcionSistema
     */
    public function setIdOpcionSistema(\hnr\sircimBundle\Entity\OpcionSistema $idOpcionSistema = null)
    {
        $this->idOpcionSistema = $idOpcionSistema;
    
        return $this;
    }

    /**
     * Get idOpcionSistema
     *
     * @return \hnr\sircimBundle\Entity\OpcionSistema 
     */
    public function getIdOpcionSistema()
    {
        return $this->idOpcionSistema;
    }
}