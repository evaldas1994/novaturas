<?php

namespace Helper;

class Url
{
    public static function make($path)
    {
        return BASE_URL . "/" . $path;
    }
}