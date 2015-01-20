<?php

namespace scrum\ScotchLodge\Entities;

use scrum\ScotchLodge\Entities\Postcode;
use Doctrine\Common\Collections\ArrayCollection;
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
    private $dist_whiskys;
    private $bottl_whiskys;
    
    function __construct() {
        $this->dist_whiskys = new ArrayCollection();
        $this->bottl_whiskys = new ArrayCollection();
    }
    function getBottl_whiskys() {
        return $this->bottl_whiskys;
    }

    function setBottl_whiskys($bottl_whiskys) {
        $this->bottl_whiskys = $bottl_whiskys;
    }

    function getDist_whiskys() {
        return $this->dist_whiskys;
    }

    function setDist_whiskys($dist_whiskys) {
        $this->dist_whiskys = $dist_whiskys;
    }

        
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