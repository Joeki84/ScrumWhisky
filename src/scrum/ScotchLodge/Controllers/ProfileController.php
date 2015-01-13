<?php
namespace scrum\ScotchLodge\Controllers;

use scrum\ScotchLodge\Controllers\Controller;
use scrum\ScotchLodge\Service\Profile\ProfileService;
use scrum\ScotchLodge\Service\Registration\RegistrationService;

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
    $username = $app->request->post('gebruikersnaam');
    $password = $app->request->post('wachtwoord'); 
    $verified = $this->srv->confirmPassword($username, $password);
    if ($verified) {
      $_SESSION['user'] =  $this->srv->getUser()->getUserName();
      $app->redirect($app->urlFor('main_page'));
    } else {
      $app->render('Profile\logon.html.twig', array('globals' => $this->getGlobals(), 'errors' => ['Ongeldige inloggegevens'] ));
    }
  }
  
  public function showProfile() {
    $app = $this->getApp();
    if ($this->isUserLoggedIn()) {
      $globals = $this->getGlobals();          
      $u = $this->getUser();
      $app->render('Profile\profile_show.html.twig', array('globals' => $globals, 'user' => $u));
    } else {
      $app->flash('error', 'U moet aangemeld zijn om uw profiel te bekijken.');
      $app->redirect($app->urlFor('user_logon'));
    }
  }
  
  public function logOff() {
    session_unset();
  }
}