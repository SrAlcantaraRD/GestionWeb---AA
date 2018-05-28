<?php
  final  class User
   {
      private $username;
      private $age;
      private $klk;

      public function __construct($username, $age = 20, $klk = "") {
          $this->username = $username;
          $this->age = $age;
          $this->klk = $klk;
      }
      public function getUsername() { return $this->username; }
      public function getAge() { return $this->age; }
  }