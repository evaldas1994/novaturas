<?php

namespace Model;

use Core\Db;

class Airport
{
    private $id = null;
    private $name;
    private $country;
    private $location;
    private $airlines;

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getCountry()
    {
        return $this->country;
    }

    public function setCountry($country)
    {
        $this->country = $country;
    }

    public function getLocation()
    {
        return $this->location;
    }

    public function setLocation($location)
    {
        $this->location = $location;
    }

    public function getAirlines()
    {
        return $this->airlines;
    }

    public function setAirlines($airlines)
    {
        $this->airlines = $airlines;
    }

    public function save()
    {
        if ($this->id !== null) {
            $this->update();
        } else {
            $this->create();
        }

        return $this;
    }

    public function create() {
        $db = new Db();

        $airport = [
            "name" => $this->name,
            "country" => $this->country,
            "location" => $this->location,
            "airlines" => (implode(',', $this->airlines))
        ];

        $db->insert("airports")->values($airport)->exec();
    }

    public function  update()
    {
        $db = new Db();

        $airport = [
            "name" => $this->name,
            "country" => $this->country,
            "location" => '54.656592, 25.242643',
            "airlines" => [2,5,6,8,4]
        ];

        $db->update("airports")->set($airport)->where("id", $this->id)->exec();
    }
}
