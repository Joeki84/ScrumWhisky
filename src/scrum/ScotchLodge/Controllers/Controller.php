<?php

namespace scrum\ScotchLodge\Controllers;

abstract class Controller {

  private $em; //emtityManager  

  /**
   * 
   * @param type $em EntityManager
   */
  function __construct($em) {
    $this->em = $em;
  }

  public function getEntityManager() {
    return $this->em;
  }

}
