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

}
