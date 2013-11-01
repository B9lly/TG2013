<?php

namespace hnr\sircimBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Posicion
 *
 * @ORM\Table(name="posicion")
 * @ORM\Entity
 */
class Posicion
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="posicion_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="po_nombre", type="string", length=50, nullable=false)
     */
    private $poNombre;



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
     * Set poNombre
     *
     * @param string $poNombre
     * @return Posicion
     */
    public function setPoNombre($poNombre)
    {
        $this->poNombre = $poNombre;
    
        return $this;
    }

    /**
     * Get poNombre
     *
     * @return string 
     */
    public function getPoNombre()
    {
        return $this->poNombre;
    }
}