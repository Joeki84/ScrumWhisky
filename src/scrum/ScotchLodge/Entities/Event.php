<?php

namespace scrum\ScotchLodge\Entities;

use scrum\ScotchLodge\Entities\Postcode;
use Doctrine\Common\Collections\ArrayCollection;

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
  private $event_stop;
  private $whiskys;

  function __construct() {
    $this->whiskys = new ArrayCollection();
  }

  function getId() {
    return $this->id;
  }

  function getTitle() {
    return $this->title;
  }

  function getPostcode() {
    return $this->postcode;
  }

  function getAddress() {
    return $this->address;
  }

  function getEventDate() {
    return $this->event_date;
  }

  function setId($id) {
    $this->id = $id;
  }

  function setTitle($title) {
    $this->title = $title;
  }

  function setPostcode(Postcode $postcode) {
    $this->postcode = $postcode;
  }

  function setAddress($address) {
    $this->address = $address;
  }

  function setEventDate($event_date) {
    $this->event_date = $event_date;
  }

  function getEvent_date() {
    return $this->event_date;
  }

  function getWhiskys() {
    return $this->whiskys;
  }

  function setEvent_date($event_date) {
    $this->event_date = $event_date;
  }

  function setWhiskys($whiskys) {
    $this->whiskys = $whiskys;
  }

  function getEventStop() {
    return $this->event_stop;
  }

  function setEventStop($event_stop) {
    $this->event_stop = $event_stop;
  }

  function getEvent_stop() {
    return $this->event_stop;
  }

  function setEvent_stop($event_stop) {
    $this->event_stop = $event_stop;
  }

}
