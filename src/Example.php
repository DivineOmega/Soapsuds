<?php

require '../vendor/autoload.php';

use DivineOmega\Soapsuds\Soapsuds;

class NumberAdditionWebService
{
    /**
     * This method takes two float parameters, add them together, and returns the result.
     *
     * @param float $number1
     * @param float $number2
     * @return float
     */
    public function addNumbers($number1, $number2)
    {
        return $number1 + $number2;
    }

}

Soapsuds::handleRequest(new NumberAdditionWebService());
