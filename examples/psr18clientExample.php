<?php

// Setup autoloading
include '../vendor/autoload.php';

use OlzaApiClient\Client as ApiClient;
use OlzaApiClient\Services\Transport;

use OlzaApiClient\Entities\Helpers\HeaderEntity;
use OlzaApiClient\Entities\Helpers\GetLabelsEnity;

use OlzaApiClient\Entities\Request\ApiBatchRequest;

// PSR-17 factories
use Nyholm\Psr7\Factory\Psr17Factory;
use Symfony\Component\HttpClient\Psr18Client as HttpClient;

// PSR-18 client


// YOUR TESTING CREDENTIALS AND SETTINGS
$apiUser = 'XXX';
$apiPassword = 'XXX';
$apiUrl = 'http://XXX';
// TESTING SECTION END

// build header using included helper
$header = new HeaderEntity();
$header->setApiUser($apiUser)
       ->setApiPassword($apiPassword)
       ->setLanguage( HeaderEntity::LANG_CS );

// build new shipment using inluded helper
$shipments = new GetLabelsEnity();
$shipments->addShipmentId(487)
          ->addShipmentId(486);

// alternative
$shipmentsArray = [485,484,480];
$shipments->addToListFromArray($shipmentsArray);

// build API request object
$apiRequest = new ApiBatchRequest();
$apiRequest->setHeaderFromHelper($header)
           ->setPayloadFromHelper($shipments);


// prepare Transport object using any PSR-17 factories
$psr17factory = new Psr17Factory; // covers Request/Response/Stream Factory, but you can use any other

// prepare PSR-18 Symfony client (or any other)
$httpClient = new HttpClient(null, new Psr17Factory, new Psr17Factory);

// setup transport using your supplied objects
$requestFactory = new Psr17Factory;
$streamFactory = new Psr17Factory;
        
$transportService = new Transport($apiUrl, $httpClient, $requestFactory, $streamFactory);

// client is created as usual
$apiClient = new ApiClient($transportService);
$apiResponse = $apiClient->getLabels($apiRequest);
   
echo '<pre>';
print_r($apiResponse);
echo '</pre>';
