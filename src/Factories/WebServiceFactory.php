<?php

namespace DivineOmega\Soapsuds\Factories;

use DivineOmega\Soapsuds\Objects\WebService;

abstract class WebServiceFactory
{
    public static function create($webServiceObject, $webServiceUrl = null)
    {
        if ($webServiceUrl==null) {

            $currentURL = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') ? 'https://' : 'http://';
            $currentURL .= $_SERVER['SERVER_NAME'];
            if($_SERVER['SERVER_PORT'] != '80' && $_SERVER['SERVER_PORT'] != '443') {
                $currentURL .= ':'.$_SERVER['SERVER_PORT'];
            } 
            $currentURL .= $_SERVER['REQUEST_URI'];

            $webServiceUrl = strtok($currentURL, '?');
        }

        return new WebService($webServiceObject, $webServiceUrl);
    }
}