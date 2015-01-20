<?php

namespace scrum\ScotchLodge\Entities;

use scrum\ScotchLodge\Entities\Postcode;
//use scrum\ScotchLodge\Entities\Region;

/**
 * Distillery entity
 *
 * @author joeri broos
 */
class Distillery {

    private $id;
    private $name;
    private $address;
    /* @var $postcode Postcode */
    private $postcode;
    /* @var $region Region */
    private $region;
    
    function getId(){
        return $this->id;
    }
    
    function getName(){
        return $this->name;
    }
    
    function getAddress(){
        return $this->address;
    }
    
    function getPostcode(){
        return $this->postcode;
    }
    
    function getRegion(){
        return $this->region;
    }
    
    function setId($id){
        $this->id = $id;
    }
    
    function setName($name){
        $this->name = $name;
    }
    
    function setAddress($address){
        $this->address = $address;
    }
    
    function setPostcode(Postcode $postcode){
        $this->postcode = $postcode;
    }
    
    function setRegion(Region $region){
        $this->region = $region;
    }    
    
}