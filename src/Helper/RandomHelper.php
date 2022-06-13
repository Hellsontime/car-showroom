<?php

namespace App\Helper;

class RandomHelper
{
    public static function getRandomBoolArray(int $chance)
    {
        if ($chance < 0 || $chance > 100) {
            return new \Exception('Incorrect chance value', 500);
        }

        $random_array = [];

        for ($i = 1; $i <= $chance; $i++) {
            $random_array[] = true;
        }

        for ($i = 1; $i <= 100 - $chance; $i++) {
            $random_array[] = false;
        }

        return $random_array;
    }
}