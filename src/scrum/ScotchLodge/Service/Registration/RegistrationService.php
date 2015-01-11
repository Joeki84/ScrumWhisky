<?php

namespace scrum\ScotchLodge\Service\Registration;

use scrum\ScotchLodge\Entities\User;
use Doctrine\ORM\Repository;

/**
 * RegistrationService registration services
 *
 * @author jan van biervliet
 */
class RegistrationService {

  private $em;
  private $app;

  function __construct($em, $app) {
    $this->app = $app;
    $this->em = $em;
  }

  function getEm() {
    return $this->em;
  }

  function getApp() {
    return $this->app;
  }

  public function processRegistration() {
    $em = $this->getEm();
    $app = $this->getApp();
    $user = new User();
    $username = $app->request->post('username');
    $user->setUsername($username);    
    $em->persist($user);
    $em->flush();
    return $user;
  }

}
