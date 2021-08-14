<?php

namespace Controller;

use Core\Controller;
use Core\Request;
use Helper\Validation\FormValidation;
use Model\Airline as AirlineModel;
use Helper\Url;

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

        if ($this->validate()) {
            $airline->setName($request->getPost("name"));
            $airline->setCountry($request->getPost("country"));

            $airline->save();
        }

        header('location: '.Url::make('airline'));
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

        if ($this->validate()) {
            $airline->setName($request->getPost("name"));
            $airline->setCountry($request->getPost("country"));
            $airline->save();
        }

        header('location: '.Url::make('airline/edit/' . $id));
    }

    public function delete($id)
    {
        $airline = new AirlineModel();
        $airline->destroy($id);

        header('location: '.Url::make('airline'));
    }

    private function validate(): bool
    {
        $request = new Request();

        if (
            FormValidation::isNameValid($request->getPost("name")) &&
            FormValidation::isCountryValid($request->getPost("country"))
        ) {
            return true;
        }

        return false;
    }
}