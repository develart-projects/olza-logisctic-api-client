<?php

// Setup autoloading
include '../vendor/autoload.php';

use OlzaApiClient\Client as ApiClient;

use OlzaApiClient\Entities\Helpers\HeaderEntity;
use OlzaApiClient\Entities\Helpers\NewShipmentEnity;

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
$shipment1 = new NewShipmentEnity();
$shipment1->setApiCustomRef('ABC')
          ->setSenderCountry('cz')
          ->setRecipientCountry('cz')
          ->setSpeditionCode('GLS')
          ->setShipmentType('WAREHOUSE')
          ->setRecipientFirstname('Honza')
          ->setRecipientSurname('Malý')
          ->setRecipientAddress('Vysoká 15/1896')
          ->setRecipientCity('Ostrava')
          ->setRecipientZipcode('70200')
          ->setRecipientEmail('test@test.com')
          ->setRecipientPhone('+420123456789')
          ->setRecipientCounty('XYZ')
          ->setPackageCount(2)
          ->setWeight(2.5)
          ->setShipmentDescription('Golden shower')
          ->addService('XS', true);

// build 2nd shipment from flat array
$shipmentArray2 = array (
  'apiCustomRef' => 'XYZ',  
  'speditionCode' => 'GLS',
  'senderCountry' => 'cz',
  'recipientCountry' => 'cz',
  'shipmentPickupDate' => '27.06.2018',
  'shipmentType' => 'WAREHOUSE',
  'recipientFirstname' => 'TEST name',
  'recipientSurname' => 'TEST surname',
  'recipientAddress' => 'TEST address',
  'recipientCity' => 'Praha',
  'recipientZipcode' => '12800',
  'recipientContactPerson' => 'TEST contact',
  'recipientPhone' => '+420987654321',
  'recipientEmail' => 'test@test.com',
  'recipientCounty' => 'XYZ',
  'shipmentDescription' => 'TEST content',
  'packageCount' => 1,
  'codAmount' => 1265,
  'codReference' => '1599 XYZ',
  'weight' => 1.5,
  'services' =>array (
                          'SM2' => '+420987654321',
        ),
);

$shipment2 = new NewShipmentEnity();
$shipment2->autoPopulate($shipmentArray2);

// build API request object
$apiRequest = new ApiBatchRequest();
$apiRequest->setHeaderFromHelper($header)
           ->addToPayloadFromHelper($shipment1)
           ->addToPayloadFromHelper($shipment2);

// communicate with OLza API using client
$apiClient = new ApiClient($apiUrl);
$apiResponse = $apiClient->createShipments($apiRequest);
    
echo '<pre>';
print_r($apiResponse);
echo '</pre>';
