<?php

namespace scrum\ScotchLodge\Entities;

use scrum\ScotchLodge\Entities\Postcode;

/**
 * Event entity
 *
 * @author joeri broos
 */
class Event {

    private $id;
    private $title;
    /* @var $postcode Postcode */
    private $postcode;
    private $address;
    private $event_date;
    
    function getId(){
        return $this->id;
    }
    
    function getTitle(){
        return $this->title;
    }
    
    function getPostcode(){
        return $this->postcode;
    }
    
    function getAddress(){
        return $this->address;
    }
    
    function getEventDate(){
        return $this->event_date;
    }
    
    function setId($id){
        $this->id = $id;
    }
    
    function setTitle($title){
        $this->title = $title;
    }
    
    function setPostcode(Postcode $postcode){
        $this->postcode = $postcode;
    }
    
    function setAddress($address){
        $this->address = $address;
    }
    
    function setEventDate($event_date){
        $this->event_date = $event_date;
    }
}