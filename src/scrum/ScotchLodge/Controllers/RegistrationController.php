<?php

namespace scrum\ScotchLodge\Controllers;

use scrum\ScotchLodge\Controllers\Controller;
use scrum\ScotchLodge\Service\Registration\RegistrationService;
use scrum\ScotchLodge\Entities\User;

/**
 * RegistrationController controller
 *
 * @author jan van biervliet
 */
class RegistrationController extends Controller {
  /* @var $srv RegistrationService */
  private $srv;

  public function __construct($em, $app) {
    parent::__construct($em, $app);
    $this->srv = new RegistrationService($em, $app);
  }

  public function processRegistration() {
    try {
      $user = $this->srv->processRegistration();
      if ($user) {
        //$this->getApp()->render('Registration\register_confirm.html.twig', array('info' => 'Registratie gelukt'));
        $url = $this->getApp()->urlFor('user_register_ok');
        $this->getApp()->redirect(  $this->getApp()->urlFor('user_register_ok'));
      } else {
        $errors = $this->srv->getErrors();
        $postcodes = $this->srv->getPostcodes();
        $this->getApp()->render('Registration\register.html.twig', array('app' => $this->getApp(), 'errors' => $errors, 'postcodes' => $postcodes));
      }
      
    } catch (Exception $e) {
      $this->getApp()->render('probleem.html.twig');
    }
  }
  
  public function registrationConfirm() {
    $this->getApp()->render('Registration/register_confirm.html.twig', array('app' => $this->getApp(), 'info' => 'Registratie voltooid'));
  }
  
  public function getPostcodes() {    
    return $this->srv->getPostcodes();
  }

}
