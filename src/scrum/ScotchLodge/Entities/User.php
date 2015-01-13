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
    return $this->enabled == 1;
  }

  function getPassword() {
    return $this->password;
  }

  function getLastLogin() {
    return $this->last_login;
  }

  function getFirstName() {
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

  function getCanReview() {
    return $this->can_review == 1;
  }

  function canCreateCategory() {
    return $this->can_create_category == 1;
  }

  function canCreateEvent() {
    return $this->can_create_event == 1;
  }

  function isAdmin() {
    return $this->is_admin == 1;
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

  function setLastLogin($last_login) {
    $this->last_login = $last_login;
  }

  function setFirstName($first_name) {
    $this->first_name = $first_name;
  }

  function setSurname($surname) {
    $this->surname = $surname;
  }

  function setPostcode(Postcode $postcode) {
    $this->postcode = $postcode;
  }

  function setAddress($address) {
    $this->address = $address;
  }

  function setCanReview($can_review) {
    $this->can_review = $can_review;
  }

  function setCanCreateCategory($can_create_category) {
    $this->can_create_category = $can_create_category;
  }

  function setCanCreateEvent($can_create_event) {
    $this->can_create_event = $can_create_event;
  }

  function setAdmin($is_admin) {
    $this->is_admin = $is_admin;
  }

}
