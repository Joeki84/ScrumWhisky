<?php

namespace scrum\ScotchLodge\Service\Registration;

use Doctrine\ORM\EntityManager;
use Valitron\Validator;

/**
 * @author jan van biervliet
 */
abstract class Validation {
  
  private $app;  
  /* @var $val Validator */
  private $val;
  /* @var $em EntityManager */
  private $em;

  public function __construct($app, $em) {
    $this->val = new Validator($app->request->post());
    $this->em = $em;
    $this->app = $app;
    $this->addRules();
  }

  public function validate() {
    return $this->val->validate();
  }

  function getErrors() {
    return $this->val->errors();
  }

  function getVal() {
    return $this->val;
  }

  function getEm() {
    return $this->em;
  }
  
  function getApp() {
    return $this->app;
  }

  abstract function addRules();
}
