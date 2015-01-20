<?php

namespace scrum\ScotchLodge\Entities;

/**
 * Barrel entity
 *
 * @author joeri broos
 */
class Barrel {

    private $id;
    private $casktype;
    
    function getId(){
        return $this->id;
    }
    
    function getCasktype(){
        return $this->casktype;
    }
    
    function setId($id){
        $this->id = $id;
    }
    
    function setCasktype($casktype){
        $this->casktype = $casktype;
    }
}