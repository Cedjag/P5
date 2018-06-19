<?php
session_start();
require 'Controllers/Router.php';
$router = new Router();
$router->RouterRequest();
