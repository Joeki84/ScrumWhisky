<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace scrum\ScotchLodge\Entities;

/**
 * Description of EventPresence
 *
 * @author Jan.VanBiervliet
 */
class EventPresence {

  private $id;
  private $user;
  private $event;
  private $answer;

  function getId() {
    return $this->id;
  }

  function getUser() {
    return $this->user;
  }

  function getEvent() {
    return $this->event;
  }

  function getAnswer() {
    return $this->answer;
  }

  function setId($id) {
    $this->id = $id;
  }

  function setUser($user) {
    $this->user = $user;
  }

  function setEvent($event) {
    $this->event = $event;
  }

  function setAnswer($answer) {
    $this->answer = $answer;
  }

}
