<?php

namespace scrum\ScotchLodge\Entities;

/**
 * Country entity
 *
 * @author jvb
 */
class Country {

  private $id;
  private $country_code;
  private $country_name;

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
