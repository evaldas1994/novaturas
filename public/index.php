<?php

include_once "../vendor/autoload.php";
include_once "../config.php";

use Core\Router;

$router = new Router();
$router->loadPage();