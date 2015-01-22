<?php

namespace scrum\ScotchLodge\Service\Comment;

/**
 * Description of CommentService
 *
 * @author Jan.VanBiervliet
 */
class CommentService {

  private $em;
  private $app;

  function __construct($em, $app) {
    $this->em = $em;
    $this->app = $app;
  }
  
  public function latestComments($limit = null) {
    $em = $this->em;
    $repo = $em->getRepository('scrum\ScotchLodge\Entities\Comment');
    $latest_comments = $repo->getRecentComments($limit);
    return $latest_comments;
  }

}
