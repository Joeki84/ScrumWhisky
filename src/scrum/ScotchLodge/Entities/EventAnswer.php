<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace scrum\ScotchLodge\Entities;

/**
 * Description of EventAnswer
 *
 * @author Jan.VanBiervliet
 */
class EventAnswer {

  private $id;
  private $answer;

  function getId() {
    return $this->id;
  }

  function getAnswer() {
    return $this->answer;
  }

  function setId($id) {
    $this->id = $id;
  }

  function setAnswer($answer) {
    $this->answer = $answer;
  }

}
