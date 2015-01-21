<?php

namespace scrum\ScotchLodge\Entities;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * Country entity
 *
 * @author jan van biervliet
 */
class Country {

  private $id;
  private $country_code;
  private $country_name;
  private $regions;
  
  function __construct() {
      $this->regions = new ArrayCollection();
  }

  function getRegions() {
      return $this->regions;
  }

  function setRegions($regions) {
      $this->regions = $regions;
  }
  
  function getId() {
    return $this->id;
  }

  function getCountry_code() {
    return $this->country_code;
  }

  function getCountry_name() {
    return $this->country_name;
  }

  function setId($id) {
    $this->id = $id;
  }

  function setCountry_code($country_code) {
    $this->country_code = $country_code;
  }

  function setCountry_name($country_name) {
    $this->country_name = $country_name;
  }

}
