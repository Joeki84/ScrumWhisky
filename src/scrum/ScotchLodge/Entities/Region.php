<?php

namespace scrum\ScotchLodge\Entities;

use scrum\ScotchLodge\Entities\Country;

/**
 * Region entity
 *
 * @author joeri broos
 */
class Region {

    private $id;
    private $name;
    /* @var $country Country */
    private $country;
    
    function getId(){
        return $this->id;
    }
    
    function getName(){
        return $this->name;
    }
    
    function getCountry(){
        return $this->country;
    }
    
    function setId($id){
        $this->id = $id;
    }
    
    function setName($name){
        $this->name = $name;
    }
    
    function setCountry(Country $country){
        $this->country = $country;
    }
    
}