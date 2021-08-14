<?php

namespace Model;

use Core\Db;

class Airline
{
    private $id = null;
    private $name;
    private $country;

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

        $airline = [
            "name" => $this->name,
            "country" => $this->country
        ];

        $db->insert("airlines")->values($airline)->exec();
    }

    public function  update()
    {
        $db = new Db();

        $airline = [
            "name" => $this->name,
            "country" => $this->country
        ];

        $db->update("airports")->set($airline)->where("id", $this->id)->exec();
    }

    public function load($id) {
        $db = new Db();
        $airport = $db->select()->from("airlines")->where("id", $id)->getOne();

        $this->id = $airport["id"];
        $this->name = $airport["name"];
        $this->country = $airport["country"];
    }

    public function destroy($id)
    {
        $db = new Db();
        $db->delete()->from("airlines")->where("id", $id)->exec();
    }
}
