<?php

namespace hnr\sircimBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Diagnostico
 *
 * @ORM\Table(name="diagnostico")
 * @ORM\Entity
 */
class Diagnostico
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="diagnostico_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="di_resultado", type="text", nullable=false)
     */
    private $diResultado;

    /**
     * @var string
     *
     * @ORM\Column(name="di_conclusion", type="text", nullable=false)
     */
    private $diConclusion;

    /**
     * @var string
     *
     * @ORM\Column(name="idempleado", type="string", length=7, nullable=false)
     */
    private $idempleado;

    /**
     * @var \EstudioRadiologico
     *
     * @ORM\ManyToOne(targetEntity="EstudioRadiologico")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_estudio_radiologico", referencedColumnName="id")
     * })
     */
    private $idEstudioRadiologico;



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
     * Set diResultado
     *
     * @param string $diResultado
     * @return Diagnostico
     */
    public function setDiResultado($diResultado)
    {
        $this->diResultado = $diResultado;
    
        return $this;
    }

    /**
     * Get diResultado
     *
     * @return string 
     */
    public function getDiResultado()
    {
        return $this->diResultado;
    }

    /**
     * Set diConclusion
     *
     * @param string $diConclusion
     * @return Diagnostico
     */
    public function setDiConclusion($diConclusion)
    {
        $this->diConclusion = $diConclusion;
    
        return $this;
    }

    /**
     * Get diConclusion
     *
     * @return string 
     */
    public function getDiConclusion()
    {
        return $this->diConclusion;
    }

    /**
     * Set idempleado
     *
     * @param string $idempleado
     * @return Diagnostico
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
     * Set idEstudioRadiologico
     *
     * @param \hnr\sircimBundle\Entity\EstudioRadiologico $idEstudioRadiologico
     * @return Diagnostico
     */
    public function setIdEstudioRadiologico(\hnr\sircimBundle\Entity\EstudioRadiologico $idEstudioRadiologico = null)
    {
        $this->idEstudioRadiologico = $idEstudioRadiologico;
    
        return $this;
    }

    /**
     * Get idEstudioRadiologico
     *
     * @return \hnr\sircimBundle\Entity\EstudioRadiologico 
     */
    public function getIdEstudioRadiologico()
    {
        return $this->idEstudioRadiologico;
    }
}