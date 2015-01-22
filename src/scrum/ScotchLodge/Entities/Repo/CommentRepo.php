<?php

namespace scrum\ScotchLodge\Entities\Repo;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Query;

/**
 * CountryRepo repository
 *
 * @author jan van biervliet
 */
class CommentRepo extends EntityRepository {

  public function getRecentComments($limit = null) {
    $qb = $this->getEntityManager()->createQueryBuilder();

    if ($limit == null) {
      $qb->select('c')
          ->from('scrum\ScotchLodge\Entities\Comment', 'c')
          ->orderBy('c.comment_date', 'DESC');
    }
    else {
      $qb->select('c')
      ->from('scrum\ScotchLodge\Entities\Comment', 'c')
      ->orderBy('c.comment_date', 'DESC')
      ->setMaxResults($limit);
    }

    /*$recent_query = $this->getEntityManager()
        ->createQuery("SELECT c FROM scrum\ScotchLodge\Entities\Comment c ORDER BY c.comment_date DESC");*/
    $query = $qb->getQuery();
    $result = $query->execute();
    return $result;
  }

}
