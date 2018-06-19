<?php

class Autoload {


   static function register() {

    spl_autoload_register (['Autoload', 'myAutoload']);
  }

   static function myAutoload($class_name) {

     $class = ucfirst($class_name);
     require 'models/' . $class . '.php';

  }
}
