<?php

namespace scrum\ScotchLodge\Entities;

/**
 * Category entity
 *
 * @author joeri broos
 */
class Category {
    
    private $id;
    private $category;
    
    function getId(){
        return $this->id;
    }
    
    function getCategory(){
        return $this->category;
    }
    
    function setId($id){
        $this->id = $id;
    }
    
    function setCategory($category){
        $this->category = $category;
    }
    
}