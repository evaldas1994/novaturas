<?php

namespace Controller;

use Core\Controller;

class Airline
{
    public function index()
    {
        $controller = new Controller();
        $controller->render("main/airline/index", []);
    }
}