<?php

namespace Controller;

use Core\Controller;
use Model\Airport as AirportModel;
use Core\Request;

class Airport
{
    public function index()
    {
        $controller = new Controller();
        $controller->render("main/airport/index", []);
    }

    public function create()
    {
        $controller = new Controller();
        $controller->render("main/airport/create", []);
    }

    public function store()
    {
        $request = new Request();
        $airport = new AirportModel();

        $airport->setName($request->getPost("name"));
        $airport->setCountry($request->getPost("country"));
        $airport->setLocation($request->getPost("location"));
        $airport->setAirlines($request->getPost("airlines"));
        $airport->save();
    }

    public function show()
    {

    }

    public function edit()
    {

    }

    public function update()
    {

    }

    public function delete()
    {

    }
}
