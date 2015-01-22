<?php

namespace scrum\ScotchLodge\Controllers;

use scrum\ScotchLodge\Controllers\Controller;
use scrum\ScotchLodge\Entities\User;

/**
 * RegistrationController controller
 *
 * @author jan van biervliet
 */
class MemberController extends Controller {
  /* @var $srv RegistrationService */

public function member() {
    $app = $this->getApp();
    if ($this->isUserLoggedIn()) {
      $globals = $this->getGlobals();
      $u = $this->getUser();
      $app->render('Members\member_list.html.twig', array('globals' => $globals, 'user' => $u));
    } else {
      $app->flash('error', 'You must be logged in to view the members page.');
      $app->redirect($app->urlFor('main_page'));
    }
  }

}