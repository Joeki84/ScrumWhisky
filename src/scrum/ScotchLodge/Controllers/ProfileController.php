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

  /* var $srv ProfileService */
  private $srv;

  public function __construct($em, $app) {
    parent::__construct($em, $app);
    $this->srv = new ProfileService($em, $app);
  }

  public function verifyUserCredentials() {
    $app = $this->getApp();
    $username = $app->request->post('gebruikersnaam');
    $password = $app->request->post('wachtwoord');
    $verified = $this->srv->confirmPassword($username, $password);
    if ($verified) {
      $this->logonIfEnabled();
    } else {
      $app->render('Profile\logon.html.twig', array('globals' => $this->getGlobals(), 'errors' => ['Ongeldige inloggegevens']));
    }
  }

  public function logonIfEnabled() {
    $app = $this->getApp();
    $username = $app->request->post('gebruikersnaam');
    $user = $this->srv->retrieveUserByUsername($username);

    if ($user->isEnabled()) {
      // logon
      $_SESSION['user'] = $user->getUsername();
      $app->redirect($app->urlFor('main_page'));
    }
    else {
      $app->flash('error', 'Gebruiker heeft geen toegang.');
      $app->redirect($app->urlFor('user_logon'));
    }
  }

  public function showProfile() {
    $app = $this->getApp();
    if ($this->isUserLoggedIn()) {
      $globals = $this->getGlobals();
      $u = $this->getUser();
      $app->render('Profile\profile_show.html.twig', array('globals' => $globals, 'user' => $u));
    }
    else {
      $app->flash('error', 'U moet aangemeld zijn om uw profiel te bekijken.');
      $app->redirect($app->urlFor('user_logon'));
    }
  }

  public function editProfile() {
    $app = $this->getApp();
    $reg_srv = new RegistrationService($this->getEntityManager(), $this->getApp());
    $postcodes = $reg_srv->getPostcodes();
    $g = $this->getGlobals();
    $app->render('Profile\profile_edit.html.twig', array('globals' => $this->getGlobals(), 'postcodes' => $postcodes));
  }

  public function storeChanges() {
    $app = $this->getApp();
    if ($this->srv->dataIsValid()) {
      $this->srv->updateUser($this->getUser());
      $app->flash('info', 'De wijzigingen zijn opgeslagen.');
      $app->redirect($app->urlFor('profile_show'));
    }
    else {
      $reg_srv = new RegistrationService($this->getEntityManager(), $this->getApp());
      $pc = $reg_srv->getPostcodes();
      $app->render('Profile\profile_edit.html.twig', array('globals' => $this->getGlobals(), 'errors' => $this->srv->getErrors(), 'postcodes' => $pc));
    }
  }
  
  public function PasswordResetRequest() {
    $app = $this->getApp();
    $app->render('Profile\password_reset_request.html.twig', array('globals' => $this->getGlobals()));
  }
  
  public function passwordResetProcess() {
    $app = $this->getApp();
    $user = $this->srv->createPasswordToken();
    if ($user != null) {
      $this->srv->mailUser($user);
    }
    $app->flash('info', 'Een mailtje werd gestuurd, indien het e-mailadres geldig is.');
    $app->redirect($app->urlFor('user_logon'));
  }

  public function logOff() {
    session_unset();
  }

}
