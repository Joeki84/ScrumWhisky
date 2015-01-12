<?php

namespace scrum\ScotchLodge\Controllers;

use Doctrine\ORM\EntityManager;
use Slim\Slim;

/**
 * Controller abstract controller
 *
 * @author jan van biervliet
 */
abstract class Controller {
  /* @var $em EntityManager */

  private $em;

  /* @var $app  Slim */
  private $app;

  function __construct($em, $app) {
    $this->em = $em;
    $this->app = $app;
    if (session_status() == PHP_SESSION_NONE) {
      session_start();
    }
  }

  public function getEntityManager() {
    return $this->em;
  }

  public function getApp() {
    return $this->app;
  }
  
  public function getGlobals() {
    $globals = array(
      'app' => $this->app,
      'user' => $this->getUser(),
      'session' => $this->getSession()
    );
    return $globals;
  }
  
  public function getSession() {
    return $_SESSION;
  }

  public function getUser() {
    if (isset($_SESSION['user'])) {
      return $_SESSION['user'];
    }
    return null;
  }

  public function isUserAdmin() {
    if (isset($_SESSION['user'])) {
      $user = $_SESSION['user'];
      return $user->isAdmin() == 1 ? true : false;
    }
    return false;
  }

}
