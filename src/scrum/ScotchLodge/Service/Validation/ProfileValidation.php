<?php

namespace scrum\ScotchLodge\Service\Validation;

use Valitron\Validator;

class ProfileValidation extends Validation {

  public function __construct($app, $em) {
    parent::__construct($app, $em);    
  }
  
  public function addRules() {
    $val = $this->getVal();
    $val->rule('required', 'voornaam');
    $val->rule('required', 'achternaam');
    $val->rule('equals', 'wachtwoord', 'herhaal_wachtwoord')->message('Wachtwoorden komen niet overeen.');
    $val->rule('required', 'adres')->message(' address in a bottle');
  }
}
