<?php

namespace scrum\ScotchLodge\Service\Profile;

use Doctrine\ORM\EntityManager;
use scrum\ScotchLodge\Entities\User;

/**
 * ProfileService
 *
 * @author jan van biervliet
 */
class ProfileService {

  private $em;

  /* var $user User */
  private $user;

  public function __construct($em) {
    $this->em = $em;
  }

  public function retrieveUserByUsername($username) {
    $repo = $this->em->getRepository('scrum\ScotchLodge\Entities\User');
    $user = $repo->findBy(array('username' => $username));
    return count($user) > 0 ? $user[0] : null;
  }

  public function confirmPassword($username, $password) {
    /* var $user User */
    $user = $this->retrieveUserByUsername($username);
    $this->user = $user;

    if (isset($user) && $user != null) {
      $hash = $user->getPassword();

      if (password_verify($password, $hash)) {
        return true;
      } else {
        return false;
      }
    } else {
      return false;
    }
  }

  function getUser() {
    return $this->user;
  }

}
