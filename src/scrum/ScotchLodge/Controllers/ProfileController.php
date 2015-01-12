<?php
namespace scrum\ScotchLodge\Controllers;

use scrum\ScotchLodge\Controllers\Controller;
use scrum\ScotchLodge\Service\Profile\ProfileService;

/**
 * ProfileController User logon, profile related actions
 *
 * @author jan van biervliet
 */
class ProfileController extends Controller {

  private $srv;
  
  public function __construct($em, $app) {
    parent::__construct($em, $app);
    $this->srv = new ProfileService($em);    
  }
  
  public function verifyUserCredentials() {
    $app = $this->getApp();
    $username = $app()->request->post('gebruikersnaam');
    $password = $app()->request->post('wachtwoord'); 
    
    $verified = $this->srv->verify($username, $password);
    
    $app->render('main_page', array('app' => $app));
  }
}