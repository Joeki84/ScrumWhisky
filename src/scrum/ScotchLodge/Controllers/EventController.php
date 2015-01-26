<?php

namespace scrum\ScotchLodge\Controllers;

use Doctrine\ORM\EntityManager;
use Slim\Slim;
use scrum\ScotchLodge\Controllers\Controller;
use scrum\ScotchLodge\Service\Event\EventService;
use scrum\ScotchLodge\Service\Registration\RegistrationService;
use scrum\ScotchLodge\Entities\Event;
use scrum\ScotchLodge\Entities\User;

/**
 * EventController controller
 * 
 * @author joeri broos 
 */
class EventController extends Controller{
    
    /*@var $eventsrv EventService */
    private $eventsrv;
    private $em;
    private $app;

    public function __construct($em, $app) {
        parent::__construct($em, $app);
        $this->eventsrv = new EventService($em, $app);
        $this->em = $em;
        $this->app = $app;
    }
    
    /**
     * Render the page to add a new event.
     */
    public function addEvent(){
        $regsrv = new RegistrationService($this->em, $this->app);
        $postcodes = $regsrv->getPostcodes();
        $globals = $this->getGlobals();
        $this->getApp()->render('Events/new_event.html.twig', array('globals' => $globals, 'postcodes' => $postcodes));
    }
    
    /**
     * Render the page to insert a event.
     */
    public function insertEvent(){
        try{
            $user = $this->getUser();
            $event = $this->eventsrv->addEvent($user);
            if($event){
                $app = $this->getApp();
                $app->flash('info', 'Event added.');
                $app->redirect($app->urlFor('main_page'));
            }else{
                $errors = $this->eventsrv->getErrors();
                $regsrv = new RegistrationService($this->em, $this->app);
                $postcodes = $regsrv->getPostcodes();
                $globals = $this->getGlobals();
                $this->getApp()->render('Events/new_event.html.twig', array('globals' => $globals, 'postcodes' => $postcodes, 'errors' => $errors));
            }
        } catch (Exception $ex) {
            $this->getApp()->render('probleem.twig.html');
        }
    }
    
/* Olivier */
    
        public function getEvents(){
          try{
          $regsrv = new RegistrationService($this->em, $this->app);
          $postcodes = $regsrv->getPostcodes();
          $globals = $this->getGlobals();  
          $events = $this->eventsrv->ShowAllCurrentEvents($this->em, $this->app);
          if($events){
              $this->getApp()->render('Events/show_event_list.html.twig', array('globals' => $globals, 'postcodes' => $postcodes, 'events' => $events));
          }
          else{
                $errors = $this->eventsrv->getErrors();
                 $app = $this->getApp();
                $app->flash('error', 'No events');
                $this->getApp()->render('Events/show_event_list.html.twig', array('globals' => $globals, 'postcodes' => $postcodes,'errors' => $errors, 'events' => $events));
            }
        } catch (Exception $ex) {
            $this->getApp()->render('probleem.twig.html');
        }
          
          
        }
        
    
        
         public function show_event_by_id($id) {
         try{

        $globals = $this->getGlobals();  
        $whisky = $this->eventsrv->retrieveEventById($id);
        
        if(whiskys){
              $this->getApp()->render('Events/show_event_by_id.html.twig', array('globals' => $globals,  'whisky' => $whisky));
          }
          else{
                $errors = $this->eventsrv->getErrors();
                 $app = $this->getApp();
                $app->flash('error', 'No whiskys');
                $this->getApp()->render('Events/show_event_by_id.html.twig', array('globals' => $globals, 'errors' => $errors, 'whisky' => $whisky));
            }
        } catch (Exception $ex) {
            $this->getApp()->render('probleem.twig.html');
        }
          
    }
        
    
/* End Olivier    */
    
    
}