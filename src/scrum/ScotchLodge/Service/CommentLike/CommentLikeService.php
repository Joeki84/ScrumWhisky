<?php

namespace scrum\ScotchLodge\Service\CommentLike;

use Doctrine\ORM\EntityManager;
use Slim\Slim;
use scrum\ScotchLodge\Entities\CommentLike;

/**
 * CommentLikeService
 *
 * @author olivier masudi
 */
class CommentLikeService {
    
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
    public function addLike(){
        $title = $this->app->request->post('title');
        $postcode = $this->app->request->post('postcode');
        $address = $this->app->request->post('address');
        $date = $this->app->request->post('event_date');      

        /* @var $event Event */
        $event = new Event();
        $event->setId(0);
        $event->setTitle($title);
        /* @var $postcode Postcode */
        $regsrv = new RegistrationService($this->em, $this->app);
        $postcode_object = $regsrv->getPostcodeObject($postcode);
        $event->setPostcode($postcode_object);
        $event->setAddress($address);
        $time = strtotime($date);
        $event_date = date('Y-m-d H:i:s',$time);
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
    public function isalreadyLike($id_comment,$id_user){
      
        $like = $this->em->getRepository('scrum\ScotchLodge\Entities\CommentLike')->findBy(array('user_id'=> $id_user  ,'comment_id' => $id_comment));
        
        
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

   
    /* End Search functions */

}