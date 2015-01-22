<?php

namespace scrum\ScotchLodge\Entities;

use scrum\ScotchLodge\Entities\Distillery;
use scrum\ScotchLodge\Entities\Barrel;
use scrum\ScotchLodge\Entities\Region;
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
  /* @var $region Region */
  private $region;
  /* @var $distillery Distillery */
  private $distillery;
  /* @var $bottlery Distillery */
  private $bottlery;
  private $price;
  private $age;
  private $alcohol;
  /* @var $barrel Barrel */
  private $barrel;
  private $view_count;
  private $short_description;
  private $review_date;
  private $scores;
  private $comments;
  private $event_whisky;
  private $events;
  private $likes;

  function __construct() {
    $this->scores = new ArrayCollection();
    $this->comments = new ArrayCollection();
    $this->events = new ArrayCollection();
    $this->likes = new ArrayCollection();
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

  function getId() {
    return $this->id;
  }

  function getName() {
    return $this->name;
  }

  function getImagePath() {
    return $this->image_path;
  }

  function getRegion() {
    return $this->region;
  }

  function getDistillery() {
    return $this->distillery;
  }

  function getBottlery() {
    return $this->bottlery;
  }

  function getPrice() {
    return $this->price;
  }

  function getAge() {
    return $this->age;
  }

  function getAlcohol() {
    return $this->alcohol;
  }

  function getBarrel() {
    return $this->barrel;
  }

  function getViewCount() {
    return $this->view_count;
  }

  function getShortDescription() {
    return $this->short_description;
  }

  function getShort_description() {
    return $this->short_description;
  }

  function setId($id) {
    $this->id = $id;
  }

  function setName($name) {
    $this->name = $name;
  }

  function setImagePath($image_path) {
    $this->image_path = $image_path;
  }

  function setRegion(Region $region) {
    $this->region = $region;
  }

  function setDistillery(Distillery $distillery) {
    $this->distillery = $distillery;
  }

  function setPrice($price) {
    $this->price = $price;
  }

  function setAge($age) {
    $this->age = $age;
  }

  function setAlcohol($alcohol) {
    $this->alcohol = $alcohol;
  }

  function setBarrel(Barrel $barrel) {
    $this->barrel = $barrel;
  }

  function setViewCount($view_count) {
    $this->view_count = $view_count;
  }

  function setView_count($view_count) {
    $this->view_count = $view_count;
  }

  function setShortDescription($short_description) {
    $this->short_description = $short_description;
  }

  function setShort_description($short_description) {
    $this->short_description = $short_description;
  }

  function setBottlery(Distillery $bottlery) {
    $this->bottlery = $bottlery;
  }

  function setReviewDate($review_date) {
    $this->review_date = $review_date;
  }

  function getLikes() {
    return $this->likes;
  }

  function setLikes($likes) {
    $this->likes = $likes;
  }

  function getView_count() {
    return $this->view_count;
  }

  function getReview_date() {
    return $this->review_date;
  }

  function setReview_date($review_date) {
    $this->review_date = $review_date;
  }

  function getReviewDate() {
    return $this->review_date;
  }

}
