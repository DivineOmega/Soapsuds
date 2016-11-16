<?php

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

require '../vendor/autoload.php';

$numberAdditionWebService = new NumberAdditionWebService();

$webService = \DivineOmega\Soapsuds\Factories\WebServiceFactory::create($numberAdditionWebService);

$webService->handleRequest();