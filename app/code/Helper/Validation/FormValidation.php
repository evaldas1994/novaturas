<?php

namespace Helper\Validation;

use Model\Airline as AirLineModel;
use Model\Airport;
use Model\Country as CountryModel;
use function Composer\Autoload\includeFile;

class FormValidation
{
    public static function isNameValid($name): bool
    {
        return self::isLengthBetween($name, 2, 100);
    }

    public static function isCountryValid($id): bool
    {
        $country = new CountryModel();

        if (is_numeric($id)) {
            $country->load($id);

            if ($country->getId() != null) {
                return true;
            }
        }

        return false;
    }

    public static function isLocationValid($location): bool
    {
        if ($location !== "") {
            $coordinates = explode(", ", $location);

            if (is_numeric($coordinates[0]) && is_numeric($coordinates[1])) {
                if(
                    number_format($coordinates[0], 6, '.', '') . ", ".
                    number_format($coordinates[1], 6, '.', '') == $location
                ) {
                    return true;
                }
            }
        }

        return false;
    }

    public static function isAirlinesValid($airlines): bool
    {
        $airline = new AirlineModel();

        foreach ($airlines as $item) {
            if (is_numeric($item)) {
                $airline->load($item);

                if ($airline->getId() === null) {
                    return false;
                }
            } else {
                return false;
            }
        }
        return true;
    }

    private static function  isLengthBetween($string, $min, $max): bool
    {
        return strlen($string) > $min && strlen($string) < $max;
    }
}