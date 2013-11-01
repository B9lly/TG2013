<?php

namespace hnr\sircimBundle\Entity;

use Doctrine\ORM\EntityRepository;

class RegionRepository extends EntityRepository
{
    public function getRegiones()
    {
        $qb = $this->createQueryBuilder('e');
        return $qb;
                
        
        /*return $this->getEntityManager()
                ->createQuery('SELECT e.esNombre FROM hnrsircimBundle:Estudio e')
                ->getResult();*/
    }    
}

?>
