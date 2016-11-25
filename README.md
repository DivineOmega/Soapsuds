# Soapsuds

Soapsuds is a PHP library that allows developers to easily create a SOAP web service from a regular class.

## Installation

Simply require this package, using Composer, in the root directory of your project.

```
composer require divineomega/soapsuds
```

Remember to include the autoload file on any page you wish to use Soapsuds, providing you are not using a framework that handles this for you.

```php
require 'vendor/autoload.php`
```

## Quick start

To create a SOAP web service using Soapsuds, you need to define a class to handle your web service requests, then pass an instance of this class into Soapsuds. That's it.

These steps are described in the following sections.

## Creating your web service class

In order to generate the WSDL (web service definition language) data required, all methods in your web service class must be fully commented using the [PHP DocBlock format](https://phpdoc.org/docs/latest/guides/docblocks.html). The following is an example of a properly commented class that will work just fine with Soapsuds.

```php
class NumberAdditionWebService
{
    /**
     * This method takes two float parameters, adds them together, and returns the result.
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
```

## Passing your class instance to SoapSuds

After defining your web service class, you should then create a new instance of it, and pass this object into the Soapsuds `handleRequest` method. This can all be done in a single line, as follows.

```php
\DivineOmega\Soapsuds\Soapsuds::handleRequest(new NumberAdditionWebService());
```

You should then be able to use the URL of this page as the endpoint for your new web service. Soapsuds also provides full WSDL output for your web service by appending `?wsdl` to the endpoint URL.
