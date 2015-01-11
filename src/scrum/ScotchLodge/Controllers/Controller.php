<?php

namespace scrum\ScotchLodge\Controllers;

abstract class Controller {

  private $em; //emtityManager  
  private $app; //emtityManager  

  /**
   * @param type $em EntityManager
   */
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
