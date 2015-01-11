<?php

namespace scrum\ScotchLodge\Entities;

/**
 * Postcode entity
 *
 * @author jan van biervliet
 */
class Postcode {

  private $id;
  private $postcode;
  private $town;

  function getId() {
    return $this->id;
  }

  function getPostcode() {
    return $this->postcode;
  }

  function getTown() {
    return $this->town;
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

}
