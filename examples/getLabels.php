<?php

// Setup autoloading
include '../vendor/autoload.php';

use OlzaApiClient\Client as ApiClient;
use OlzaApiClient\Services\Transport;

use OlzaApiClient\Entities\Helpers\HeaderEntity;
use OlzaApiClient\Entities\Helpers\GetLabelsEnity;

use OlzaApiClient\Entities\Request\ApiBatchRequest;

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

// communicate with OLza API using client
$transportService = new Transport($apiUrl);
$apiClient = new ApiClient($transportService);
$apiResponse = $apiClient->getLabels($apiRequest);
   
echo '<pre>';
print_r($apiResponse);
echo '</pre>';
