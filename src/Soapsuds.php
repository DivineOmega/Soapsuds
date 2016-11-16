<?php

namespace DivineOmega\Soapsuds;

use DivineOmega\Soapsuds\Factories\WebServiceFactory;

abstract class Soapsuds
{
    public static function handleRequest($webServiceObject)
    {
        $webService = WebServiceFactory::create($webServiceObject);
        $webService->handleRequest();
    }
}
