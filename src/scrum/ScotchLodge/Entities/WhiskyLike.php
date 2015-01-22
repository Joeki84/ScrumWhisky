<?php

namespace scrum\ScotchLodge\Entities;

/**
 * Description of WhiskyLike
 *
 * @author jan.vanbiervliet
 */
class WhiskyLike {

  private $id;
  private $whisky;
  private $user;

  function getId() {
    return $this->id;
  }

  function getWhisky() {
    return $this->whisky;
  }

  function getUser() {
    return $this->user;
  }

  function setId($id) {
    $this->id = $id;
  }

  function setWhisky($whisky) {
    $this->whisky = $whisky;
  }

  function setUser($user) {
    $this->user = $user;
  }

}
