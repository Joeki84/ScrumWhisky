<?php

namespace scrum\ScotchLodge\Entities;

use scrum\ScotchLodge\Entities\Distillery;
use scrum\ScotchLodge\Entities\Barrel;
use Doctrine\Common\Collections\ArrayCollection;

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
    private $short_description;
    /* @var $bottlery Distillery */
    private $bottlery;
    private $scores;
    private $comments;
    private $event_whisky;
    private $events;
    
    function __construct() {
        $this->scores = new ArrayCollection();
        $this->comments = new ArrayCollection();
        $this->events = new ArrayCollection();
    }

    function getEvents() {
        return $this->events;
    }

    function setEvents($events) {
        $this->events = $events;
    }
    
    function getEventWhisky() {
        return $this->event_whisky;
    }

    function setEventWhisky($event_whisky) {
        $this->event_whisky = $event_whisky;
    }
    
    function getComments() {
        return $this->comments;
    }

    function setComments($comments) {
        $this->comments = $comments;
    }

    function getScores() {
        return $this->scores;
    }

    function setScores($scores) {
        $this->scores = $scores;
    }
    
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
    
    function getShortDescription(){
        return $this->short_description;
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
    
    function setShortDescription($short_description){
        $this->short_description = $short_description;
    }
    
    function setBottlery(Bottllery $bottlery){
        $this->bottlery = $bottlery;
    }
}