<?php


namespace App\Service;


class Calculator
{

    public function sum($a, $b)
    {
        return $a + $b;
    }

    public function minus($a, $b)
    {
        return $a - $b;
    }

    public function random($count, $min, $max)
    {
        $randoms = [];
        for($i = 0; $i < $count; $i++){
            array_push(
                $randoms,
                is_null($min) ? rand() : (is_null($max) ? rand($min) : rand($min, $max))
            );
        }
        return $randoms;
    }

}