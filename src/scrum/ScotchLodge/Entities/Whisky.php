<?php

namespace scrum\ScotchLodge\Entities;

use scrum\ScotchLodge\Entities\Distillery;
use scrum\ScotchLodge\Entities\Barrel;

/**
 * Whisky entity
 *
 * @author joeri broos
 */
class Whisky {
    
    private $id;
    private $name;
    private $image_path;
    /* @var $distillery Distillery */    
    private $distillery;
    private $price;
    private $age;
    private $alcohol;
    /* @var $barrel Barrel */
    private $barrel;
    private $short_discription;
    /* @var $bottlery Distillery */
    private $bottlery;
    
    function getId(){
        return $this->id;
    }
    
    function getName(){
        return $this->name;
    }
    
    function getImagePath(){
        return $this->image_path;
    }
    
    function getDistillery(){
        return $this->distillery;
    }
    
    function getPrice(){
        return $this->price;
    }
    
    function getAge(){
        return $this->age;
    }
    
    function getAlcohol(){
        return $this->alcohol;
    }
    
    function getBarrel(){
        return $this->barrel;
    }
    
    function getShortDiscription(){
        return $this->short_discription;
    }
    
    function getBottlery(){
        return $this->bottlery;
    }
    
    function setId($id){
        $this->id = $id;
    }
    
    function setName($name){
        $this->name = $name;
    }
    
    function setImagePath($image_path){
        $this->image_path = $image_path;
    }
    
    function setDistillery(Distillery $distillery){
        $this->distillery = $distillery;
    }
    
    function setPrice($price){
        $this->price = $price;
    }
    
    function setAge($age){
        $this->age = $age;
    }
    
    function setAlcohol($alcohol){
        $this->alcohol = $alcohol;
    }
    
    function setBarrel(Barrel $barrel){
        $this->barrel = $barrel;
    }
    
    function setShortDiscription($short_discription){
        $this->short_discription = $short_discription;
    }
    
    function setBottlery(Bottllery $bottlery){
        $this->bottlery = $bottlery;
    }
}