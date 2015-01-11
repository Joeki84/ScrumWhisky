<?php

namespace scrum\ScotchLodge\Controllers;

use scrum\ScotchLodge\Controllers\Controller;
use scrum\ScotchLodge\Service\Registration\RegistrationService;

/**
 * RegistrationController controller
 *
 * @author jan van biervliet
 */
class RegistrationController extends Controller {

  private $srv;

  public function __construct($em, $app) {
    parent::__construct($em, $app);
    $this->srv = new RegistrationService($em, $app);
  }

  public function processRegistration() {
    try {
      $this->srv->processRegistration();
    } catch (Exception $e) {
      $this->getApp()->render('probleem.html.twig');
    }
  }

}
