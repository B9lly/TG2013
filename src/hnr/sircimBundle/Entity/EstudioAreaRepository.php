<?php

namespace hnr\sircimBundle\Entity;

use Doctrine\ORM\EntityRepository;

class EstudioAreaRepository extends EntityRepository
{
    public $idArea;
    
    /*public function setidArea(){
        $this->idArea = $idArea;
        
        return $this;
    }*/
    
    public function getEstudios()
    {
        $qb = $this->createQueryBuilder('e')
                ->where('e.idArea = :idArea')
                ->setParameter('idArea', $this->idArea);
        return $qb;
                
        
        /*return $this->getEntityManager()
                ->createQuery('SELECT e.esNombre FROM hnrsircimBundle:Estudio e')
                ->getResult();*/
    }    
}

?>
