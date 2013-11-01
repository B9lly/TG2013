<?php

namespace hnr\sircimBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
/**
 * Estudio
 *
 * @ORM\Table(name="estudio")
 * @ORM\Entity(repositoryClass="hnr\sircimBundle\Entity\EstudioRepository")
 */
class Estudio
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="estudio_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="es_nombre", type="string", length=50, nullable=false)
     * @Assert\NotBlank()
     */
    private $esNombre;

    /**
     * @var string
     *
     * @ORM\Column(name="es_abreviatura", type="string", length=10, nullable=false)
     */
    private $esAbreviatura;

    /**
     * @var string
     *
     * @ORM\Column(name="es_tipo", type="string", length=15, nullable=false)
     */
    private $esTipo;

    /**
     * @var string
     *
     * @ORM\Column(name="es_descripcion", type="string", length=100, nullable=false)
     */
    private $esDescripcion;

    /**
     * @var string
     *
     * @ORM\Column(name="es_usuario_creacion", type="string", length=15, nullable=false)
     */
    private $esUsuarioCreacion;

    /**
     * @var string
     *
     * @ORM\Column(name="es_usuario_modificacion", type="string", length=15, nullable=true)
     */
    private $esUsuarioModificacion;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="es_fecha_creacion", type="datetime", nullable=false)
     */
    private $esFechaCreacion;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="es_fecha_modificacion", type="datetime", nullable=true)
     */
    private $esFechaModificacion;



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
     * Set esNombre
     *
     * @param string $esNombre
     * @return Estudio
     */
    public function setEsNombre($esNombre)
    {
        $this->esNombre = $esNombre;
    
        return $this;
    }

    /**
     * Get esNombre
     *
     * @return string 
     */
    public function getEsNombre()
    {
        return $this->esNombre;
    }

    /**
     * Set esAbreviatura
     *
     * @param string $esAbreviatura
     * @return Estudio
     */
    public function setEsAbreviatura($esAbreviatura)
    {
        $this->esAbreviatura = $esAbreviatura;
    
        return $this;
    }

    /**
     * Get esAbreviatura
     *
     * @return string 
     */
    public function getEsAbreviatura()
    {
        return $this->esAbreviatura;
    }

    /**
     * Set esTipo
     *
     * @param string $esTipo
     * @return Estudio
     */
    public function setEsTipo($esTipo)
    {
        $this->esTipo = $esTipo;
    
        return $this;
    }

    /**
     * Get esTipo
     *
     * @return string 
     */
    public function getEsTipo()
    {
        return $this->esTipo;
    }

    /**
     * Set esDescripcion
     *
     * @param string $esDescripcion
     * @return Estudio
     */
    public function setEsDescripcion($esDescripcion)
    {
        $this->esDescripcion = $esDescripcion;
    
        return $this;
    }

    /**
     * Get esDescripcion
     *
     * @return string 
     */
    public function getEsDescripcion()
    {
        return $this->esDescripcion;
    }

    /**
     * Set esUsuarioCreacion
     *
     * @param string $esUsuarioCreacion
     * @return Estudio
     */
    public function setEsUsuarioCreacion($esUsuarioCreacion)
    {
        $this->esUsuarioCreacion = $esUsuarioCreacion;
    
        return $this;
    }

    /**
     * Get esUsuarioCreacion
     *
     * @return string 
     */
    public function getEsUsuarioCreacion()
    {
        return $this->esUsuarioCreacion;
    }

    /**
     * Set esUsuarioModificacion
     *
     * @param string $esUsuarioModificacion
     * @return Estudio
     */
    public function setEsUsuarioModificacion($esUsuarioModificacion)
    {
        $this->esUsuarioModificacion = $esUsuarioModificacion;
    
        return $this;
    }

    /**
     * Get esUsuarioModificacion
     *
     * @return string 
     */
    public function getEsUsuarioModificacion()
    {
        return $this->esUsuarioModificacion;
    }

    /**
     * Set esFechaCreacion
     *
     * @param \DateTime $esFechaCreacion
     * @return Estudio
     */
    public function setEsFechaCreacion($esFechaCreacion)
    {
        //$this->esFechaCreacion = $esFechaCreacion;
        $this->esFechaCreacion = $esFechaCreacion;
    
        return $this;
    }

    /**
     * Get esFechaCreacion
     *
     * @return \DateTime 
     */
    public function getEsFechaCreacion()
    {
        return $this->esFechaCreacion;
    }

    /**
     * Set esFechaModificacion
     *
     * @param \DateTime $esFechaModificacion
     * @return Estudio
     */
    public function setEsFechaModificacion($esFechaModificacion)
    {
        $this->esFechaModificacion = $esFechaModificacion;
    
        return $this;
    }

    /**
     * Get esFechaModificacion
     *
     * @return \DateTime 
     */
    public function getEsFechaModificacion()
    {
        return $this->esFechaModificacion;
    }

    public function __toString(){
        return $this->esNombre;
    }

    


}