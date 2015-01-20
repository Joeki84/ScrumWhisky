<?php

namespace scrum\ScotchLodge\Entities;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * Postcode entity
 *
 * @author jan van biervliet
 */
class Postcode {

  private $id;
  private $postcode;
  private $town;
  private $users;
  private $distilleries;
  private $events;

  function __construct($users) {
    $this->users = new ArrayCollection();
    $this->distilleries = new ArrayCollection();
    $this->events = new ArrayCollection();
  }

  function getDistilleries() {
    return $this->distilleries;
  }

  function setDistilleries($distilleries) {
    $this->distilleries = $distilleries;
  }

  function getId() {
    return $this->id;
  }

  function getPostcode() {
    return $this->postcode;
  }

  function getTown() {
    return $this->town;
  }

  function getUsers() {
    return $this->users;
  }

  function setId($id) {
    $this->id = $id;
  }

  function setPostcode($postcode) {
    $this->postcode = $postcode;
  }

  function setTown($town) {
    $this->town = $town;
  }

  function setUsers($users) {
    $this->users = $users;
  }

  function getEvents() {
    return $this->events;
  }

  function setEvents($events) {
    $this->events = $events;
  }

}
