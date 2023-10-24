OlzaLogistic API PHP Client
=============================

Olza Logistic PHP API client is a useful PHP helper for developers who want to integrate basic API actions into their e-shop/application.
 It covers most of the needed possibilities, but programmers are free to use the API directly, if they need a special functionality that is not provided by the client.

For additional information please contact your dedicated Olza Logistic manager.

## Important notices

It's recommended to lock client minor version in composer to avoid unintended client interface changes, which can occur in between the minor versions.

```json
"require" : {
      "develart-projects/olza-logisctic-api-client": "~1.5.0"
    }
```

**!! Breaking change from version 1.6.0 !!**
From version 1.6.0 http client is decoupled and Guzzle is not provided by default. You have to either install it by yourself or you are free to use any PSR-18 client instead.
Instantination of the client has also changed.

## Features

- client provides standard interface for preparing requests, including entities for each API call
- client automatically checks and validates returned results
- results are hydrated into prepared lists and entities for easier manipulation
- different types of exceptions are thrown/returned, based on the occurred event
- included support for Composer

## Structure of client

The client is documented using DocBlock, so feel free to read the description of functions/classes provided. You can find following types of files within the client’s structure:

* **examples** - every API call has its own client usage example in this folder, please start here.
* **src/entities/helpers** - data structures to prepare request data. Fill structure using setters/methods to prepare request.
* **src/entities/request** - request helper. Feed these classes with helper objects (or use direct array feed) to get correct API request structure.
* **src/entities/response** - classes, which hold returned results. Client sorts all response types into provided classes. Whole response is accessible by ApiBatchResponse object
* **exception** - all exception types by API event. Read class description to get meaning of an exception.

## Basic usage example (using Guzzle client)

More verbose usage examples are located in the **examples** folder.
Contact your dedicated Olza Logistic manager to gain access to API and URLs.

The client has only one mandatory constructor parameter: Transport object. This object covers all needs for HTTP communication and it's part or the package. By setting up Transport object, you are telling to client how to communicate.
**In this example Guzzle client has to be installed before client is used.**

Example of getting shipments statuses:

```php
// Setup autoloading
include '../vendor/autoload.php';

use OlzaApiClient\Client as ApiClient;
use OlzaApiClient\Services\Transport;

use OlzaApiClient\Entities\Helpers\HeaderEntity;
use OlzaApiClient\Entities\Helpers\GetStatusesEntity;

use OlzaApiClient\Entities\Request\ApiBatchRequest;

// YOUR SPECIFIC DATA
$apiUser = 'XXX';
$apiPassword = 'XXX';
$apiUrl = 'http://XXX';
// SPECIFIC DATA END

// build header using included helper
$header = new HeaderEntity();
$header->setApiUser($apiUser)
       ->setApiPassword($apiPassword)
       ->setLanguage( HeaderEntity::LANG_CS );

// build new shipment using inluded helper
$shipments = new GetStatusesEntity();
$shipments->addShipmentId(487)
          ->addShipmentId(486);

// build API request object
$apiRequest = new ApiBatchRequest();
$apiRequest->setHeaderFromHelper($header)
           ->setPayloadFromHelper($shipments);

// prepare Transport object
$transportService = new Transport($apiUrl); // <-- will use Guzzle, if installed

// communicate with Olza API using client
$apiClient = new ApiClient($transportService);
$apiResponse = $apiClient->getStatuses($apiRequest);

echo '<pre>';
print_r($apiResponse);
echo '</pre>';
```

## Advanced usage example (using any PSR-18 client)

This is really handy, when Guzzle can't be used, because of version clashes, or if you preffer any other http client. Http client has to follow PSR-18 interface and you will need PSR-17 factories as well. Implementation details are your choice.

Example of setting up client using PSR-18 http client.
This example is using Symfony PSR-18 http client (symfony/http-client) and Http Soft PSR-17 factories (httpsoft/http-message).

```php
// Setup autoloading
include '../vendor/autoload.php';

use OlzaApiClient\Client as ApiClient;
use OlzaApiClient\Services\Transport;

// your custom PSR-17 packages
use HttpSoft\Message\RequestFactory;
use HttpSoft\Message\ResponseFactory;
use HttpSoft\Message\StreamFactory;

// prepare HTTP client
$httpClient = new \Symfony\Component\HttpClient\Psr18Client(null, new ResponseFactory, new StreamFactory);

// prepare transport object with your custom packages
$transportService = new Transport($apiUrl, $httpClient, new RequestFactory, new StreamFactory);

// now you can use the client
$apiClient = new ApiClient($transportService);
```

You can combine all 3 additional params of the Transport object as you wish.

## Installing the client

The recommended way to install Olza Logistic API client is through
[Composer](http://getcomposer.org).

```bash
# Install Composer
curl -sS https://getcomposer.org/installer | php
```

Next, run the Composer command to install the latest stable version of Client:

```bash
php composer.phar require develart-projects/olza-logisctic-api-client
```

After installing, you need to require Composer's autoloader:

```php
require 'vendor/autoload.php';
```

You can then later update Client using composer:

 ```bash
composer.phar update
 ```
