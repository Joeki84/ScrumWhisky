<?php

namespace scrum\ScotchLodge\Controllers;

//use scrum\ScotchLodge\Controllers\Controller;
use scrum\ScotchLodge\Service\Profile\ProfileService;
use scrum\ScotchLodge\Service\Event\EventService;
use scrum\ScotchLodge\Service\Comment\CommentService;
use scrum\ScotchLodge\Controllers\Controller;

/**
 * HomepageController
 *
 * @author jan van biervliet
 */
class HomepageController extends Controller {

  public function homepage() {
    $globals = $this->getGlobals();

    $members = ProfileService::showalluser();
    $events = EventService::LatestEvents();
    $events_five = EventService::LatestFiveEvents();
    $events_one = EventService::LatestEvent();

    $commentSrvc = new CommentService($this->getEntityManager(), $this->getApp());

    $comments = $commentSrvc->retrieveComments(3);


    $this->getApp()->render('homepage.html.twig', array('globals' => $globals, 'members' => $members, 'events' => $events, 'events_five' => $events_five, 'events_one' => $events_one, 'comments' => $comments));
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
