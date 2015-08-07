<?php
//Contact object with three properties
    class Contact
    {
          private $name;
          private $phone;
          private $address;

          function __construct($name, $phone, $address)
          {
                $this->name = $name;
                $this->phone = $phone;
                $this->address = $address;
          }
//Setters and Getters for contact variables
          function getName()
          {
                return $this->name;
          }


          function setName($new_name)
          {
                $this->name = $name;
          }

          function getPhone()
          {
                return $this->phone;
          }

          function setPhone($new_phone)
          {
                $this->phone = $phone;
          }

          function getAddress()
          {
                return $this->address;
          }

          function setAddress($new_address)
          {
                $this->address = $address;
          }
// This is a method that saves the input from the user.
          function save ()
          {
                array_push($_SESSION['list_of_contacts'], $this);
          }

//This is a method that returns the contact information saved from the input.
          static function getAll()
          {
              return $_SESSION['list_of_contacts'];
          }

//method that deletes contacts.
          static function deleteAll()
          {
                $_SESSION['list_of_contacts'] = array();
          }
    }
    ?>
