<?php

namespace App;

class LeapYear
{
    public function isLeapYear($year)
    {
        if(! is_int($year)){
            throw new \InvalidArgumentException("Argument must be of type integer");
        }
        if($year < 0 || $year > 9999){
            return "Argument must be between 0 and 9999";
        }
        if ($year % 4 == 0 && $year % 100 != 0 || $year % 400 == 0) {
            return true;
        }
        return false;
    }
}