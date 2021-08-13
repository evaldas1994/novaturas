<?php

namespace Core;

use Cassandra\Exception\LogicException;

class Router
{
    public function loadPage()
    {
        $request = new Request();
        $path = $request->getPathInfo();

        $urlParams = $this->parseUrl($path);
        $controller = $urlParams["class"];
        $method = $urlParams["method"];
        $param = $urlParams["param"];

        $controllerObj = new $controller;
        $controllerObj->$method($param);

    }

    private function parseUrl($path)
    {
        $urlParams = [
            "class" => $this->getControllerClass('home'),
            "method" => "index",
            "param" => null
        ];

        if ($path) {
            $path = trim($path,'/');
            $path = explode('/', $path);

            if (isset($path[0])) {
                if (class_exists("\Controller\\". ucfirst($path[0]), true)) {
                    $urlParams["class"] = $this->getControllerClass($path[0]);

                    if (isset($path[1])) {
                        $urlParams["method"] = $path[1];

                        if (!method_exists($urlParams["class"], $urlParams["method"])) {
                            $urlParams["class"] = $this->getControllerClass("error");
                            $urlParams["method"] = "index";
                        }
                    }
                } else {
                    $urlParams["class"] = $this->getControllerClass("error");
                    $urlParams["method"] = "index";
                }
            }
        }

        return $urlParams;
    }

    private function getControllerClass($name)
    {
        return "\Controller\\". ucfirst($name);
    }
}