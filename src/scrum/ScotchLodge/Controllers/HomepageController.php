<?php

namespace scrum\ScotchLodge\Controllers;

use scrum\ScotchLodge\Controllers\Controller;

/**
 * HomepageController
 *
 * @author jan van biervliet
 */
class HomepageController extends Controller {

  public function homepage() {
    $globals = $this->getGlobals();
    $this->getApp()->render('homepage.html.twig', array('globals' => $globals));
  }

}
