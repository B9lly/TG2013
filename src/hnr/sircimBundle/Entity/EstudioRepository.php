<?php

namespace hnr\sircimBundle\Entity;

use Doctrine\ORM\EntityRepository;

class EstudioRepository extends EntityRepository
{
    public function getEstudios()
    {
        $qb = $this->createQueryBuilder('e')
                /*->innerJoin(e., $alias)
                ->where('e.id = :id')*/
                ;
        return $qb;
                
        
        /*return $this->getEntityManager()
                ->createQuery('SELECT e.esNombre FROM hnrsircimBundle:Estudio e')
                ->getResult();*/
    }    
}

?>
