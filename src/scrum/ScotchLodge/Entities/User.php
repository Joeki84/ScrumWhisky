<?php

namespace scrum\ScotchLodge\Entities;

use scrum\ScotchLodge\Entities\Postcode;

/**
 * User entity
 *
 * @author jan van biervliet
 */
class User {

  private $id;
  private $username;
  private $email;
  private $enabled;
  private $password;
  private $last_login;
  private $first_name;
  private $surname;
  /* @var $postcode Postcode */
  private $postcode;
  private $address;
  private $can_review;
  private $can_create_category;
  private $can_create_event;
  private $is_admin;

  function getId() {
    return $this->id;
  }

  function getUsername() {
    return $this->username;
  }

  function getEmail() {
    return $this->email;
  }

  function getEnabled() {
    return $this->enabled;
  }

  function getPassword() {
    return $this->password;
  }

  function getLast_login() {
    return $this->last_login;
  }

  function getFirst_name() {
    return $this->first_name;
  }

  function getSurname() {
    return $this->surname;
  }

  function getPostcode() {
    return $this->postcode;
  }

  function getAddress() {
    return $this->address;
  }

  function getCan_review() {
    return $this->can_review;
  }

  function getCan_create_category() {
    return $this->can_create_category;
  }

  function getCan_create_event() {
    return $this->can_create_event;
  }

  function getIs_admin() {
    return $this->is_admin;
  }

  function setId($id) {
    $this->id = $id;
  }

  function setUsername($username) {
    $this->username = $username;
  }

  function setEmail($email) {
    $this->email = $email;
  }

  function setEnabled($enabled) {
    $this->enabled = $enabled;
  }

  function setPassword($password) {
    $this->password = $password;
  }

  function setLast_login($last_login) {
    $this->last_login = $last_login;
  }

  function setFirst_name($first_name) {
    $this->first_name = $first_name;
  }

  function setSurname($surname) {
    $this->surname = $surname;
  }

  function setPostcode($postcode) {
    $this->postcode = $postcode;
  }

  function setAddress($address) {
    $this->address = $address;
  }

  function setCan_review($can_review) {
    $this->can_review = $can_review;
  }

  function setCan_create_category($can_create_category) {
    $this->can_create_category = $can_create_category;
  }

  function setCan_create_event($can_create_event) {
    $this->can_create_event = $can_create_event;
  }

  function setIs_admin($is_admin) {
    $this->is_admin = $is_admin;
  }

}
