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

    public function getId()
    {
        return $this->id;
    }

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
            "airlines" => implode(',', $this->airlines)
        ];

        $db->insert("airports")->values($airport)->exec();
    }

    public function  update()
    {
        $db = new Db();

        $airport = [
            "name" => $this->name,
            "country" => $this->country,
            "location" => $this->location,
            "airlines" => implode(',', $this->airlines)
        ];

        $db->update("airports")->set($airport)->where("id", $this->id)->exec();
    }

    public function load($id) {
        $db = new Db();
        $airport = $db->select()->from("airports")->where("id", $id)->getOne();

        $this->id = $airport["id"];
        $this->name = $airport["name"];
        $this->country = $airport["country"];
        $this->location = $airport["location"];
        $this->airlines = explode(',', $airport["airlines"]);
    }

    public function destroy($id)
    {
        $db = new Db();
        $db->delete()->from("airports")->where("id", $id)->exec();
    }
}
