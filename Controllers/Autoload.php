<?php
require_once dirname(__DIR__).'/vendor/autoload.php';
require_once dirname(__DIR__).'/apikey.php';

class Autoload {
  
  static function register() {
    spl_autoload_register (['Autoload', 'myAutoload']);
  }
   
  static function myAutoload($class_name) {
    $class = ucfirst($class_name);
    require 'Models/' . $class . '.php';
  }
}
