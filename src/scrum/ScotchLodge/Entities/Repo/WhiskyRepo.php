<?php

namespace scrum\ScotchLodge\Entities\Repo;

use Doctrine\ORM\EntityRepository;

/**
 * WhiskyRepo
 *
 * @author joeri broos
 */
class WhiskyRepo extends EntityRepository {

  public function getLatestReviews($limit = null) {
    $dql = "SELECT w FROM scrum\ScotchLodge\Entities\Whisky w ORDER BY w.review_date DESC";
    $query = $this->getEntityManager()->createQuery($dql);
    if ($limit != null) {
      $query->setMaxResults($limit);
    }
    $results = $query->execute();
    return $results;
  }
  
  public function getPopularReviews($limit = null) {
    $dql = "SELECT wl as whisky, count(wl.user) as likes FROM scrum\ScotchLodge\Entities\WhiskyLike wl GROUP BY wl.whisky ORDER BY likes DESC";
    $query = $this->getEntityManager()->createQuery($dql);
    if ($limit != null) {
      $query->setMaxResults($limit);
    }
    $results = $query->execute();
    return $results;
  }
  
  public function findFiltered($req) {
    $em = $this->getEntityManager();
    $qb = $em->createQueryBuilder();
    $qb->select('w')
        ->from('scrum\ScotchLodge\Entities\Whisky', 'w');
    
    if (isset($req['region'])) {
      $region_repo = $em->getRepository('scrum\ScotchLodge\Entities\Region');
      $region = $region_repo->find($req['region']);
      $qb->where('w.region = :region')
          ->setParameter('region', $region);          
    }
    
    if (isset($req['distillery'])) {
      $distilelry_repo = $em->getRepository('scrum\ScotchLodge\Entities\Distillery');
      $distillery = $distilelry_repo->find($req['distillery']);
      $qb->andWhere('w.distillery = :distillery')
          ->setParameter('distillery', $distillery);
    }
    
    if (isset($req['bottler'])) {
      $bottler_repo = $em->getRepository('scrum\ScotchLodge\Entities\Distillery');
      $bottler = $bottler_repo->find($req['bottler']);
    }
    
    
    
    $query = $qb->getQuery();
    return $query->execute();
  }

}
