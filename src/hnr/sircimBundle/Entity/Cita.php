<?php

namespace hnr\sircimBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Cita
 *
 * @ORM\Table(name="cita")
 * @ORM\Entity
 */
class Cita
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="cita_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var integer
     *
     * @ORM\Column(name="ci_edad_paciente", type="smallint", nullable=false)
     */
    private $ciEdadPaciente;

    /**
     * @var string
     *
     * @ORM\Column(name="ci_estado", type="string", length=11, nullable=false)
     */
    private $ciEstado;

    /**
     * @var \Solicitud
     *
     * @ORM\ManyToOne(targetEntity="Solicitud",cascade={"persist","remove"})
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_solicitud", referencedColumnName="id")
     * })
     */
    private $idSolicitud;



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
     * Set ciEdadPaciente
     *
     * @param integer $ciEdadPaciente
     * @return Cita
     */
    public function setCiEdadPaciente($ciEdadPaciente)
    {
        $this->ciEdadPaciente = $ciEdadPaciente;
    
        return $this;
    }

    /**
     * Get ciEdadPaciente
     *
     * @return integer 
     */
    public function getCiEdadPaciente()
    {
        return $this->ciEdadPaciente;
    }

    /**
     * Set ciEstado
     *
     * @param string $ciEstado
     * @return Cita
     */
    public function setCiEstado($ciEstado)
    {
        $this->ciEstado = $ciEstado;
    
        return $this;
    }

    /**
     * Get ciEstado
     *
     * @return string 
     */
    public function getCiEstado()
    {
        return $this->ciEstado;
    }

    /**
     * Set idSolicitud
     *
     * @param \hnr\sircimBundle\Entity\Solicitud $idSolicitud
     * @return Cita
     */
    public function setIdSolicitud(\hnr\sircimBundle\Entity\Solicitud $idSolicitud = null)
    {
        $this->idSolicitud = $idSolicitud;
    
        return $this;
    }

    /**
     * Get idSolicitud
     *
     * @return \hnr\sircimBundle\Entity\Solicitud 
     */
    public function getIdSolicitud()
    {
        return $this->idSolicitud;
    }
     
}