<?php

namespace hnr\sircimBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * OpcionSistema
 *
 * @ORM\Table(name="opcion_sistema")
 * @ORM\Entity
 */
class OpcionSistema
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="opcion_sistema_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="os_nombre", type="string", length=50, nullable=false)
     */
    private $osNombre;



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
     * Set osNombre
     *
     * @param string $osNombre
     * @return OpcionSistema
     */
    public function setOsNombre($osNombre)
    {
        $this->osNombre = $osNombre;
    
        return $this;
    }

    /**
     * Get osNombre
     *
     * @return string 
     */
    public function getOsNombre()
    {
        return $this->osNombre;
    }
}