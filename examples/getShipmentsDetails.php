<?php

// Setup autoloading
include '../vendor/autoload.php';

use OlzaApiClient\Client as ApiClient;
use OlzaApiClient\Services\Transport;

use OlzaApiClient\Entities\Helpers\HeaderEntity;
use OlzaApiClient\Entities\Helpers\GetShipmentsDetailsEntity;

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
$details = new GetShipmentsDetailsEntity();
$details->setShipmentListFilterFromArray([407,408,1500])
        ->setSpeditionListFilterFromArray(["GLS","ZAS"]);

// build API request object
$apiRequest = new ApiBatchRequest();
$apiRequest->setHeaderFromHelper($header)
           ->setPayloadFromHelper($details);

// communicate with Olza API using client
$transportService = new Transport($apiUrl);
$apiClient = new ApiClient($transportService);
$apiResponse = $apiClient->getShipmentsDetails($apiRequest);

echo '<pre>';
print_r($apiResponse);
echo '</pre>';
