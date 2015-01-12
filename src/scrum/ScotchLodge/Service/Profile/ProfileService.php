<?php

namespace scrum\ScotchLodge\Service\Profile;

use Doctrine\ORM\EntityManager;

/**
 * ProfileService
 *
 * @author jan van biervliet
 */
class ProfileService {

  private $em;
  
  public function __construct($em) {
    $this->em = $em;    
  }

  public function retrieveUserByUsername($name) {
    $repo = $em->getRepository('scrum\ScotchLodge\Entities\User');
    $user = $repo->findBy(array('username'));
    return $user;
  }
  
  public function verify ($username, $password) {
    $user = $this->retrieveUserByUsername($username);
  }

}
