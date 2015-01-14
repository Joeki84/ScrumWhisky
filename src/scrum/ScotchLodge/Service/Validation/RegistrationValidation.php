<?php

namespace scrum\ScotchLodge\Service\Validation;

use Valitron\Validator;

class RegistrationValidation extends Validation {

  public function __construct($app, $em) {
    // custom rule unique email
    Validator::addRule('unique_email', function($field, $value, array $params) use ($em, $app) {
      $email = $app->request->post('email');
      $repo = $em->getRepository('scrum\ScotchLodge\Entities\User');
      $result = $repo->findBy(array('email' => $email));
      return count($result) < 1;
    }, 'already exists');
    
    // custom rule unique username
    Validator::addRule('unique_username', function($field, $value, array $params) use ($em, $app) {
      $username = $app->request->post('gebruikersnaam');
      $repo = $em->getRepository('scrum\ScotchLodge\Entities\User');
      $result = $repo->findBy(array('username' => $username));
      return count($result) < 1;      
    }, 'already exists');
    
    parent::__construct($app, $em);
    // custom rule
  }
  
  public function addRules() {
    $val = $this->getVal();
    $val->rule('required', 'gebruikersnaam');
    $val->rule('unique_username', 'gebruikersnaam');
    $val->rule('email', 'email');
    $val->rule('unique_email', 'email');    
    $val->rule('required', 'email');
    $val->rule('required', 'wachtwoord');    
    $val->rule('required', 'voornaam');
    $val->rule('required', 'achternaam');
    $val->rule('equals', 'wachtwoord', 'herhaal_wachtwoord')->message('Wachtwoorden komen niet overeen.');
    $val->rule('required', 'adres');
  }
}
