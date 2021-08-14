<?php

namespace Controller;

use Core\Controller;
use Core\Request;
use Model\Airline as AirlineModel;

class Airline
{
    public function index()
    {
        $controller = new Controller();
        $controller->render("main/airline/index", []);
    }

    public function create()
    {
        $controller = new Controller();
        $controller->render("main/airline/create", []);
    }

    public function store()
    {
        $request = new Request();
        $airline = new AirlineModel();

        $airline->setName($request->getPost("name"));
        $airline->setCountry($request->getPost("country"));

        $airline->save();
    }

    public function show($id)
    {
        $airline = new AirlineModel();
        $airline->load($id);

        $data['airline'] = $airline;

        $controller = new Controller();
        $controller->render("main/airline/show", $data);
    }

    public function edit($id)
    {
        $airline = new AirlineModel();
        $airline->load($id);

        $data['airline'] = $airline;

        $controller = new Controller();
        $controller->render("main/airline/edit", $data);
    }

    public function update($id)
    {
        $request = new Request();
        $airline = new AirlineModel();
        $airline->load($id);

        $airline->setName($request->getPost("name"));
        $airline->setCountry($request->getPost("country"));
        $airline->save();
    }

    public function delete($id)
    {
        $airline = new AirlineModel();
        $airline->destroy($id);
    }
}