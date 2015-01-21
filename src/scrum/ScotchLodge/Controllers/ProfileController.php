<?php

namespace scrum\ScotchLodge\Controllers;

use scrum\ScotchLodge\Controllers\Controller;
use scrum\ScotchLodge\Service\Profile\ProfileService;
use scrum\ScotchLodge\Service\Registration\RegistrationService;
use scrum\ScotchLodge\Service\Validation\EmailNotBlankValidation as EmailVal;

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

  /* logon */

  public function logon() {
    $globals = $this->getGlobals();
    $this->getApp()->render('Profile\logon.html.twig', array('globals' => $globals));
  }

  public function verifyUserCredentials() {
    $app = $this->getApp();
    $username = $app->request->post('username');
    $password = $app->request->post('password');
    $verified = $this->srv->confirmPassword($username, $password);
    if ($verified) {
      $this->logonIfEnabled();
    } else {
      $app->render('homepage.html.twig', array('globals' => $this->getGlobals(), 'errors' => ['Invalid credentials']));
    }
  }

  public function logOff() {
    unset($_SESSION['user']);
    session_unset();
    $globals = $this->getGlobals();
    $this->getApp()->render('homepage.html.twig', array('globals' => $globals));
  }

  public function logonIfEnabled() {
    $app = $this->getApp();
    $username = $app->request->post('username');
    $user = $this->srv->retrieveUserByUsername($username);

    if ($user->isEnabled()) {
      // logon
      $_SESSION['user'] = $user->getUsername();
      $this->srv->storeLoginTime($user);
      $app->redirect($app->urlFor('main_page'));
    } else {
      $app->flash('error', 'Access denied.');
      $app->redirect($app->urlFor('user_logon'));
    }
  }

  /* profile */

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
  
  public function editProfile() {
    $app = $this->getApp();
    $reg_srv = new RegistrationService($this->getEntityManager(), $this->getApp());
    $postcodes = $reg_srv->getPostcodes();
    $g = $this->getGlobals();    
    $app->render('Profile\profile_edit.html.twig', array('globals' => $this->getGlobals(), 'postcodes' => $postcodes));
  }
  
  
/* olivier */
  public function editProfileAdmin($username) {
    $app = $this->getApp();
    $reg_srv = new RegistrationService($this->getEntityManager(), $this->getApp());
    $postcodes = $reg_srv->getPostcodes();
    $g = $this->getGlobals();
  
    $usertoedit = $this->srv->retrieveUserByUsername($username);
    
    
    $app->render('Profile\profile_edit_admin.html.twig', array('globals' => $this->getGlobals(), 'postcodes' => $postcodes, 'usertoedit' => $usertoedit));
  }
  /* olivier */
  
  
  
  public function storeChanges() {
    $app = $this->getApp();
    if ($this->srv->dataIsValid()) {
      $this->srv->updateUser($this->getUser());
      $app->flash('info', 'User profile updated.');
      $app->redirect($app->urlFor('profile_show'));
    } else {
      $reg_srv = new RegistrationService($this->getEntityManager(), $this->getApp());
      $pc = $reg_srv->getPostcodes();
      $app->render('Profile\profile_edit.html.twig', array('globals' => $this->getGlobals(), 'errors' => $this->srv->getErrors(), 'postcodes' => $pc));
    }
  }

  /* password reset */

  public function PasswordResetRequest() {
    $app = $this->getApp();
    $app->render('Profile\password_reset_request.html.twig', array('globals' => $this->getGlobals()));
  }

  public function passwordResetProcess() {
    $app = $this->getApp();
    $em = $this->getEntityManager();

    $val = new EmailVal($app, $em);
    if ($val->validate()) {
      $user = $this->srv->createPasswordToken();
      if ($user != null) {
        $this->srv->mailUser($user);
      }
      $app->flash('info', 'A mail will be sent shortly if the email address provided is valid.');
      $app->redirect($app->urlFor('user_logon'));
    } else {
      $app->flash('error', 'E-mail address is not valid.');
      $app->redirect($app->urlFor('password_reset_request'));
    }
  }

  /* password reset */

  public function processToken($id) {
    $app = $this->getApp();
    $srv = $this->srv;
    $user = $srv->searchUserByToken($id);
    if ($user != null) {
      $app->render('Profile/password_reset.html.twig', array('globals' => $this->getGlobals(), 'user_id' => $user->getId()));
    } else {
      $srv->clearAllTokens(); // safety measure
      $app->flash('error', 'Invalid or expired token. Please try to request a new password');
      $app->redirect($app->urlFor('main_page'));
    }
  }

  public function processNewPassword() {
    $srv = $this->srv;
    $app = $this->getApp();
    if ($srv->isPasswordValid()) {
      $srv->changePassword();
      $srv->clearToken();
      $app->flash('info', 'Password has been changed');
      $app->redirect($app->urlFor('user_logon'));
    } else {
      $id = $app->request->post('id');
      $errors = $srv->getErrors();
      $app->render('Profile/password_reset.html.twig', array('globals' => $this->getGlobals(), 'user_id' => $id, 'errors' => $errors));
    }
  }
  
  public function showProfileOfUserWithId($id) {     
      
    $app = $this->getApp();
    $reg_srv = new RegistrationService($this->getEntityManager(), $this->getApp());
    $postcodes = $reg_srv->getPostcodes();
    
    $srv = $this->srv;
    $usertoview = $srv->searchUserById($id);
    if ($usertoview != null) {
      $app->render('Profile/profile_show_by_id.html.twig', array('globals' => $this->getGlobals(), 'postcodes' => $postcodes, 'usertoview' => $usertoview));
    } else {
      $app->flash('error', 'Invalid user. Please try again');
      $app->redirect($app->urlFor('main_page'));
    }
    
  }

}
