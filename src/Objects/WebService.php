<?php

namespace DivineOmega\Soapsuds\Objects;

use Zend\Soap\AutoDiscover;
use Zend\Soap\Server;
use Zend\Soap\Wsdl\ComplexTypeStrategy\AnyType;

class WebService
{
    private $handlerObject = null;
    private $handlerClass = null;
    private $url = null;

    public function __construct($webServiceObject, $webServiceUrl)
    {
        if (!is_object($webServiceObject)) {
            throw new Exception('You must provide an object to handle the web service.');
        }

        $class = get_class($webServiceObject);

        if (!$class) {
            throw new Exception('Unable to determine the class name of the provided object.');
        }

        $this->handlerObject = $webServiceObject;
        $this->handlerClass = $class;
        $this->url = $webServiceUrl;
    }

    public function handleRequest()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            if (! isset($_GET['wsdl'])) {
                header('HTTP/1.1 400 Client Error');
                exit;
            }

            $autodiscover = new AutoDiscover(new AnyType);
            $autodiscover->setClass($this->handlerClass)->setUri($this->url);
            $wsdl = $autodiscover->generate();

            header('Content-Type: text/xml');
            echo $wsdl->toXml();
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] != 'POST') {
            header('HTTP/1.1 400 Client Error');
            exit;
        }

        $soap = new Server($this->url.'?wsdl');
        $soap->setObject($this->handlerObject);
        $soap->handle();
        exit;
    }
}