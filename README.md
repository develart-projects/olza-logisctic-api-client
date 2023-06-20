OlzaLogistic API PHP Client
=============================

Olza Logistic PHP API client is a useful PHP helper for developers who want to integrate basic API actions into their e-shop/application.
 It covers most of the needed possibilities, but programmers are free to use the API directly, if they need a special functionality that is not provided by the client.

For additional information please contact your dedicated Olza Logistic manager.

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

## Basic usage example

More verbose usage examples are located in the **examples** folder.
Contact your dedicated Olza Logistic manager to gain access to API and URLs.

The client has only one mandatory constructor parameter: API URL.

Example of getting shipments statuses:

```php
// Setup autoloading
include '../vendor/autoload.php';

use OlzaApiClient\Client as ApiClient;

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

// communicate with Olza API using client
$apiClient = new ApiClient($apiUrl);
$apiResponse = $apiClient->getStatuses($apiRequest);

echo '<pre>';
print_r($apiResponse);
echo '</pre>';
```
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

## Important notice

It's recommended to lock client minor version in composer to avoid unintended client interface changes, which can occur in between the minor versions.

```json
"require" : {
      "develart-projects/olza-logisctic-api-client": "1.0.*"
    }
```