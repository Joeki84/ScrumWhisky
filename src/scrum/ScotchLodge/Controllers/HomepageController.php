<?php

namespace scrum\ScotchLodge\Controllers;


//use scrum\ScotchLodge\Controllers\Controller;
use scrum\ScotchLodge\Service\Profile\ProfileService;
use scrum\ScotchLodge\Service\Event\EventService;


use scrum\ScotchLodge\Controllers\Controller;


/**
 * HomepageController
 *
 * @author jan van biervliet
 */
class HomepageController extends Controller {

  public function homepage() {
    $globals = $this->getGlobals();
     
    
    $members=ProfileService::showalluser();
    $events=EventService::LatestEvents();
   
    $this->getApp()->render('homepage.html.twig', array('globals' => $globals, 'members' => $members, 'events' => $events));
  }
  
  public function simplifydRoutes($routes) {
    $simple = array();
    foreach ($routes as $route) {
      $simple[$route->getName()] = $route->getPattern();
    }
    return $simple;
  }
  
  public function showRoutes() {
    $app = $this->getApp();
    $routes = $app->router->getNamedRoutes();
    $simple = $this->simplifydRoutes($routes);
    $app->render('Test\routes.html.twig', array('globals' => $this->getGlobals(), 'routes' => $simple));
  }

}
