<?php

namespace Controller;

use Core\Controller as CoreController;

class Error
{
    public function index()
    {
        $coreController = new CoreController();
        $coreController->render("main/page-not-found/index", []);
    }
}