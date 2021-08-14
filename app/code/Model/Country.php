<?php

namespace Model;

use Core\Db;

class Country
{
    private $id = null;
    private $code;
    private $country;

    public function getId()
    {
        return $this->id;
    }

    public function getCode()
    {
        return $this->code;
    }

    public function setCode($code)
    {
        $this->code = $code;
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

        $country = [
            "code" => $this->code,
            "country" => $this->country
        ];

        $db->insert("countries")->values($country)->exec();
    }

    public function  update()
    {
        $db = new Db();

        $country = [
            "name" => $this->code,
            "country" => $this->country
        ];

        $db->update("countries")->set($country)->where("id", $this->id)->exec();
    }

    public function load($id) {
        $db = new Db();
        $country = $db->select()->from("countries")->where("id", $id)->getOne();

        if ($country !== null) {
            $this->id = $country["id"];
            $this->code = $country["code"];
            $this->country = $country["country"];
        }
    }

    public function destroy($id)
    {
        $db = new Db();
        $db->delete()->from("countries")->where("id", $id)->exec();
    }
}
