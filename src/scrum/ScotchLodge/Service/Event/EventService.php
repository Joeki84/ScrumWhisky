<?php

namespace scrum\ScotchLodge\Service\Event;

use Doctrine\ORM\EntityManager;
use Slim\Slim;
use scrum\ScotchLodge\Entities\Event;
use scrum\ScotchLodge\Service\Validation\EventValidation as Val;
use scrum\ScotchLodge\Service\Registration\RegistrationService;

/**
 * EventService
 *
 * @author joeri broos
 */
class EventService {
    
    private $em;
    private $app;
    private $errors;

    public function __construct($em, $app) {
      $this->em = $em;
      $this->app = $app;
      $this->errors = null;
    }

    public function getErrors(){
        return $this->errors;
    }

    /* Begin Add function */    
    /**
     * Create a new event, returns a Event when there are no errors,
     * otherwhise it gives a false in return.
     * @return boolean|Event
     */
    public function addEvent(){
        $title = $this->app->request->post('title');
        $postcode = $this->app->request->post('postcode');
        $address = $this->app->request->post('address');
        $date = $this->app->request->post('event_date');      

        /* @var $event Event */
        $event = new Event();
        $event->setTitle($title);
        /* @var $postcode Postcode */
        $regsrv = new RegistrationService($this->em, $this->app);
        $postcode_object = $regsrv->getPostcodeObject($postcode);
        $event->setPostcode($postcode_object);
        $event->setAddress($address);
        $event_date = new DateTime('Y-m-d H:i:s',$date);
        $event->setEventDate($event_date);

        $val = new Val($this->app, $this->em);
        if($val->validate()){
            $this->em->persist($event);
            $this->em->flush();
            return $event;
        }
        $this->errors = $val->getErrors();
        return false;
    }
    /* End Add function */    

    /* Begin Update function */
    /**
     * Update the fields of a event
     * @param Event $event
     */
    public function updateEvent(Event $event){
        $title = $this->app->request->post('title');
        if($event->getFirstName() != $title){
          $event->setTitle($title);
        }

        $postcode = $this->app->request->post('postcode');
        if($event->getPostcode()->getId() != $postcode){
            $regsrv = new RegistrationService();
            $postcode_object = $regsrv->getPostcodeObject($postcode);
            $event->setPostcode($postcode_object);
        }

        $address = $this->app->request->post('address');
        if($event->getAddress() != $address){
            $event->setAddress($address);
        }

        $event_date = $this->app->request->post('event_date');
        if($event->getEventDate() != $event_date){
            $event->setEventDate($event_date);
        }

        $this->em->persist($event);
        $this->em->flush();
    }
    /* End Update function */

    /* Begin Search functions */
    /**
     * Retrieve a event by is Id
     * @param int $id
     * @return Event $event
     */
    public function retrieveEventById($id){
        $event = $this->em->getRepository('scrum\ScotchLodge\Entities\Event')->find($id);
        if(count($event)> 0){
            return $event;
        }else{
            return null;
        }
    }

    /**
     * Retrieve all events of a specific date
     * @return Array of Events
     */
    public function retrieveEventsByDate(){
        $event_date = $this->app->request->post('event_date');
        $events = $this->em->getRepository('scrum\ScotchLodge\Entities\Event')->findBy(array('event_date' => $event_date));
        if(count($events)> 0){
            return $events;
        }else{
            return null;
        }
    }
    
    /**
     * Retrieve all events of a specific postcode
     * @return Array of Events
     */
    public function retrieveEventsByPostCode(){
        $postcode_id = $this->app->request->post('postcode');
        $events = $this->em->getRepository('scrum\ScotchLodge\Entities\Event')->findBy(array('postcode_id' => $postcode_id));
        if(count($events)> 0){
            return $events;
        }else{
            return null;
        }        
    }

/* Olivier */    
    public function LatestEvents(){
    $em = $this->getEntityManager();
    $eventRepository = $em->getRepository('scrum\ScotchLodge\Entities\Event');
    $dql = "SELECT e FROM scrum\ScotchLodge\Entities\Event e where e.event_date >= CURRENT_DATE() ORDER BY e.event_date ASC";
    $query = $em->createQuery($dql);
    $query->setMaxResults(30);
    $events = $query->getResult();
    return $events;
    
    }
/* End Olivier */    
    
    /* End Search functions */

}