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
    $recent = $this->getEntityManager()
        ->createQuery("SELECT c FROM Comment c");
    if ($limit != null) {
      Query::setMaxResults($limit);
    }
    return $recent;
  }

}
