<?php

namespace Controller;

use Core\Controller;

class Home
{
    public function index()
    {
        $controller = new Controller();
        $controller->render("main/home/index", []);
    }
}

