<?php

namespace Controller;

use Core\Controller;
use Helper\Url;
use Helper\Validation\FormValidation;
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

        if ($this->validate()) {
            $airport->setName($request->getPost("name"));
            $airport->setCountry($request->getPost("country"));
            $airport->setLocation($request->getPost("location"));
            $airport->setAirlines($request->getPost("airlines"));
            $airport->save();
        }

        header('location: '.Url::make('airport'));
    }

    public function show($id)
    {
        $airport = new AirportModel();
        $airport->load($id);

        $data['airport'] = $airport;

        $controller = new Controller();
        $controller->render("main/airport/show", $data);
    }

    public function edit($id)
    {
        $airport = new AirportModel();
        $airport->load($id);

        $data['airport'] = $airport;

        $controller = new Controller();
        $controller->render("main/airport/edit", $data);
    }

    public function update($id)
    {
        $request = new Request();
        $airport = new AirportModel();
        $airport->load($id);

        if ($this->validate()) {
            $airport->setName($request->getPost("name"));
            $airport->setCountry($request->getPost("country"));
            $airport->setLocation($request->getPost("location"));
            $airport->setAirlines($request->getPost("airlines"));
            $airport->save();
        }

        header('location: '.Url::make('airport/edit/' . $id));
    }

    public function delete($id)
    {
        $airport = new AirportModel();
        $airport->destroy($id);

        header('location: '.Url::make('airport'));
    }

    private function validate(): bool
    {
        $request = new Request();

        if (
            FormValidation::isNameValid($request->getPost("name")) &&
            FormValidation::isCountryValid($request->getPost("country")) &&
            FormValidation::isLocationValid($request->getPost("location")) &&
            FormValidation::isAirlinesValid($request->getPost("airlines"))
        ) {
            return true;
        }

        return false;
    }
}
