<?php

namespace scrum\ScotchLodge\Entities;

use scrum\ScotchLodge\Entities\Country;
use Doctrine\Common\Collections\ArrayCollection;

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
    private $distilleries;
    private $whiskys;

    function __construct($distilleries) {
        $this->distilleries = new ArrayCollection();
        $this->whiskys = new ArrayCollection();
    }
    
    function getId(){
        return $this->id;
    }
    
    function getName(){
        return $this->name;
    }
    
    function getCountry(){
        return $this->country;
    }
    
    function getDistilleries() {
        return $this->distilleries;
    }

    function setDistilleries($distilleries) {
        $this->distilleries = $distilleries;
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
    
    function getWhiskys() {
      return $this->whiskys;
    }

    function setWhiskys($whiskys) {
      $this->whiskys = $whiskys;
    }

}