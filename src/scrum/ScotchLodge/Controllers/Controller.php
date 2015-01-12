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
  }

  public function getEntityManager() {
    return $this->em;
  }

  public function getApp() {
    return $this->app;
  }
}
