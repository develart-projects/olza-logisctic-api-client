<?php

namespace OlzaApiClient\Entities\Helpers;

/**
 * API new shipment data entity
 */
class NewShipmentEnity extends AbstractHelper
{
    
    /**
     *
     * @var string 
     */
    protected $apiCustomRef;
    
    /**
     *
     * @var string 
     */
    protected $senderCountry;
    
    /**
     *
     * @var string 
     */
    protected $recipientCountry;
    
    /**
     *
     * @var string 
     */
    protected $speditionCode;
    
    /**
     *
     * @var string 
     */
    protected $shipmentType;
    
    /**
     *
     * @var int 
     */
    protected $senderId;
    
    /**
     *
     * @var string 
     */
    protected $senderName;
    
    /**
     *
     * @var string 
     */
    protected $senderAddress;
    
    /**
     *
     * @var string 
     */
    protected $senderCity;
    
    /**
     *
     * @var string 
     */
    protected $senderZipcode;
    
    /**
     *
     * @var string 
     */
    protected $senderContactPerson;
    
    /**
     *
     * @var string 
     */
    protected $senderEmail;
    
    /**
     *
     * @var string 
     */
    protected $senderPhone;
    
    /**
     *
     * @var string 
     */
    protected $recipientFirstname;
    
    /**
     *
     * @var string 
     */
    protected $recipientSurname;
    
    /**
     *
     * @var string 
     */
    protected $recipientAddress;
    
    /**
     *
     * @var string 
     */
    protected $recipientCity;
    
    /**
     *
     * @var string 
     */
    protected $recipientZipcode;
    
    /**
     *
     * @var string 
     */
    protected $recipientContactPerson;
    
    /**
     *
     * @var string 
     */
    protected $recipientEmail;
    
    /**
     *
     * @var string 
     */
    protected $recipientPhone;
    
    /**
     *
     * @var int 
     */
    protected $pickupPlaceId;
    
    /**
     *
     * @var string 
     */
    protected $dispatchPlaceId;
    
    /**
     *
     * @var array 
     */
    protected $services = Array();
    
    /**
     *
     * @var float 
     */
    protected $codAmount;
    
    /**
     *
     * @var string 
     */
    protected $codReference;
    
    /**
     *
     * @var int
     */
    protected $packageCount = 1;
    
    /**
     *
     * @var float 
     */
    protected $weight;
    
    /**
     *
     * @var string 
     */
    protected $shipmentDescription;
    
    /**
     *
     * @var bool 
     */
    protected $pick = false;
    
    /**
     *
     * @var string
     */
    protected $shipmentPickupDate;
    
    /**
     *
     * @var string 
     */
    protected $marketPlaceId;
    
    /**
     *
     * @var string 
     */
    protected $senderCounty;
    
    /**
     *
     * @var string 
     */
    protected $recipientCounty;
    
    /**
     *
     * @var bool 
     */
    protected $recipientWarehouseFlag = false;
    
    /**
     * 
     * @var array
     */
    protected $customs = [
        'params' => [],
        'items' => [],
    ];
    
    
    /**
     * 
     * @return string
     */
    public function getApiCustomRef() {
        return $this->apiCustomRef;
    }

    /**
     * 
     * @param string $apiCustomRef
     * @return NewShipmentEnity
     */
    public function setApiCustomRef($apiCustomRef) {
        $this->apiCustomRef = $apiCustomRef;
        return $this;
    }
        
    /**
     * 
     * @return string
     */
    public function getSenderCountry() {
        return $this->senderCountry;
    }

    /**
     * 
     * @return string
     */
    public function getRecipientCountry() {
        return $this->recipientCountry;
    }

    /**
     * 
     * @return string
     */
    public function getSpeditionCode() {
        return $this->speditionCode;
    }

    /**
     * 
     * @return string
     */
    public function getShipmentType() {
        return $this->shipmentType;
    }

    /**
     * 
     * @return int
     */
    public function getSenderId() {
        return $this->senderId;
    }

    /**
     * 
     * @return string
     */
    public function getSenderName() {
        return $this->senderName;
    }

    /**
     * 
     * @return string
     */
    public function getSenderAddress() {
        return $this->senderAddress;
    }

    /**
     * 
     * @return string
     */
    public function getSenderCity() {
        return $this->senderCity;
    }

    /**
     * 
     * @return string
     */
    public function getSenderZipcode() {
        return $this->senderZipcode;
    }

    /**
     * 
     * @return string
     */
    public function getSenderContactPerson() {
        return $this->senderContactPerson;
    }

    /**
     * 
     * @return string
     */
    public function getSenderEmail() {
        return $this->senderEmail;
    }

    /**
     * 
     * @return string
     */
    public function getSenderPhone() {
        return $this->senderPhone;
    }

    /**
     * 
     * @return string
     */
    public function getRecipientFirstname() {
        return $this->recipientFirstname;
    }

    /**
     * 
     * @return string
     */
    public function getRecipientSurname() {
        return $this->recipientSurname;
    }

    /**
     * 
     * @return string
     */
    public function getRecipientAddress() {
        return $this->recipientAddress;
    }

    /**
     * 
     * @return string
     */
    public function getRecipientCity() {
        return $this->recipientCity;
    }

    /**
     * 
     * @return string
     */
    public function getRecipientZipcode() {
        return $this->recipientZipcode;
    }

    /**
     * 
     * @return string
     */
    public function getRecipientContactPerson() {
        return $this->recipientContactPerson;
    }

    /**
     * 
     * @return string
     */
    public function getRecipientEmail() {
        return $this->recipientEmail;
    }

    /**
     * 
     * @return string
     */
    public function getRecipientPhone() {
        return $this->recipientPhone;
    }

    /**
     * 
     * @return int
     */
    public function getPickupPlaceId() {
        return $this->pickupPlaceId;
    }

    /**
     * 
     * @return array
     */
    public function getServices() {
        return $this->services;
    }

    /**
     * 
     * @return float
     */
    public function getCodAmount() {
        return $this->codAmount;
    }

    /**
     * 
     * @return string
     */
    public function getCodReference() {
        return $this->codReference;
    }

    /**
     * 
     * @return int
     */
    public function getPackageCount() {
        return $this->packageCount;
    }

    /**
     * 
     * @return float
     */
    public function getWeight() {
        return $this->weight;
    }

    /**
     * 
     * @return string
     */
    public function getShipmentDescription() {
        return $this->shipmentDescription;
    }

    /**
     * 
     * @return bool
     */
    public function getPick() {
        return $this->pick;
    }

    /**
     * 
     * @return string
     */
    public function getShipmentPickupDate() {
        return $this->shipmentPickupDate;
    }

    /**
     * 
     * @param string $senderCountry
     * @return NewShipmentEnity
     */
    public function setSenderCountry($senderCountry) {
        $this->senderCountry = $senderCountry;
        return $this;
    }

    /**
     * 
     * @param string $recipientCountry
     * @return NewShipmentEnity
     */
    public function setRecipientCountry($recipientCountry) {
        $this->recipientCountry = $recipientCountry;
        return $this;
    }

    /**
     * 
     * @param string $speditionCode
     * @return NewShipmentEnity
     */
    public function setSpeditionCode($speditionCode) {
        $this->speditionCode = $speditionCode;
        return $this;
    }

    /**
     * 
     * @param string $shipmentType
     * @return NewShipmentEnity
     */
    public function setShipmentType($shipmentType) {
        $this->shipmentType = $shipmentType;
        return $this;
    }

    /**
     * 
     * @param int $senderId
     * @return NewShipmentEnity
     */
    public function setSenderId($senderId) {
        $this->senderId = $senderId;
        return $this;
    }

    /**
     * 
     * @param string $senderName
     * @return NewShipmentEnity
     */
    public function setSenderName($senderName) {
        $this->senderName = $senderName;
        return $this;
    }

    /**
     * 
     * @param string $senderAddress
     * @return NewShipmentEnity
     */
    public function setSenderAddress($senderAddress) {
        $this->senderAddress = $senderAddress;
        return $this;
    }

    /**
     * 
     * @param string $senderCity
     * @return NewShipmentEnity
     */
    public function setSenderCity($senderCity) {
        $this->senderCity = $senderCity;
        return $this;
    }

    /**
     * 
     * @param string $senderZipcode
     * @return NewShipmentEnity
     */
    public function setSenderZipcode($senderZipcode) {
        $this->senderZipcode = $senderZipcode;
        return $this;
    }

    /**
     * 
     * @param string $senderContactPerson
     * @return NewShipmentEnity
     */
    public function setSenderContactPerson($senderContactPerson) {
        $this->senderContactPerson = $senderContactPerson;
        return $this;
    }

    /**
     * 
     * @param string $senderEmail
     * @return NewShipmentEnity
     */
    public function setSenderEmail($senderEmail) {
        $this->senderEmail = $senderEmail;
        return $this;
    }

    /**
     * 
     * @param string $senderPhone
     * @return NewShipmentEnity
     */
    public function setSenderPhone($senderPhone) {
        $this->senderPhone = $senderPhone;
        return $this;
    }

    /**
     * 
     * @param string $recipientFirstname
     * @return NewShipmentEnity
     */
    public function setRecipientFirstname($recipientFirstname) {
        $this->recipientFirstname = $recipientFirstname;
        return $this;
    }

    /**
     * 
     * @param string $recipientSurname
     * @return NewShipmentEnity
     */
    public function setRecipientSurname($recipientSurname) {
        $this->recipientSurname = $recipientSurname;
        return $this;
    }

    /**
     * 
     * @param string $recipientAddress
     * @return NewShipmentEnity
     */
    public function setRecipientAddress($recipientAddress) {
        $this->recipientAddress = $recipientAddress;
        return $this;
    }

    /**
     * 
     * @param string $recipientCity
     * @return NewShipmentEnity
     */
    public function setRecipientCity($recipientCity) {
        $this->recipientCity = $recipientCity;
        return $this;
    }

    /**
     * 
     * @param string $recipientZipcode
     * @return NewShipmentEnity
     */
    public function setRecipientZipcode($recipientZipcode) {
        $this->recipientZipcode = $recipientZipcode;
        return $this;
    }

    /**
     * 
     * @param string $recipientContactPerson
     * @return NewShipmentEnity
     */
    public function setRecipientContactPerson($recipientContactPerson) {
        $this->recipientContactPerson = $recipientContactPerson;
        return $this;
    }

    /**
     * 
     * @param string $recipientEmail
     * @return NewShipmentEnity
     */
    public function setRecipientEmail($recipientEmail) {
        $this->recipientEmail = $recipientEmail;
        return $this;
    }

    /**
     * 
     * @param string $recipientPhone
     * @return NewShipmentEnity
     */
    public function setRecipientPhone($recipientPhone) {
        $this->recipientPhone = $recipientPhone;
        return $this;
    }

    /**
     * 
     * @param string $pickupPlaceId
     * @return NewShipmentEnity
     */
    public function setPickupPlaceId($pickupPlaceId) {
        $this->pickupPlaceId = $pickupPlaceId;
        return $this;
    }

    /**
     * 
     * @param array $services
     * @return NewShipmentEnity
     */
    public function setServices(array $services) {
        $this->services = $services;
        return $this;
    }

    /**
     * 
     * @param float $codAmount
     * @return NewShipmentEnity
     */
    public function setCodAmount($codAmount) {
        $this->codAmount = $codAmount;
        return $this;
    }

    /**
     * 
     * @param string $codReference
     * @return NewShipmentEnity
     */
    public function setCodReference($codReference) {
        $this->codReference = $codReference;
        return $this;
    }

    /**
     * 
     * @param int $packageCount
     * @return NewShipmentEnity
     */
    public function setPackageCount($packageCount) {
        $this->packageCount = $packageCount;
        return $this;
    }

    /**
     * 
     * @param float $weight
     * @return NewShipmentEnity
     */
    public function setWeight($weight) {
        $this->weight = $weight;
        return $this;
    }

    /**
     * 
     * @param string $shipmentDescription
     * @return NewShipmentEnity
     */
    public function setShipmentDescription($shipmentDescription) {
        $this->shipmentDescription = $shipmentDescription;
        return $this;
    }

    /**
     * 
     * @param bool $pick
     * @return NewShipmentEnity
     */
    public function setPick($pick) {
        $this->pick = $pick;
        return $this;
    }

    /**
     * 
     * @param string $shipmentPickupDate
     * @return NewShipmentEnity
     */
    public function setShipmentPickupDate($shipmentPickupDate) {
        $this->shipmentPickupDate = $shipmentPickupDate;
        return $this;
    }

    /**
     * Append new service to request
     * @param string $serviceKey
     * @param string|bool $serviceValue = NULL
     * @return NewShipmentEnity
     */    
    public function addService($serviceKey, $serviceValue = NULL) {
        
        if( !isset($this->services[$serviceKey]) ) {
           $this->services[$serviceKey] = $serviceValue; 
        }   
        
        return $this;
    }  
    
    /**
     * Remove specific service from service pool
     * @param string $serviceKey
     * @return NewShipmentEnity
     */
    public function removeService($serviceKey) {
        
        unset($this->services[$serviceKey]);
        
        return $this;
    }
    
    /**
     * Update value of existing service
     * @param string $serviceKey
     * @param string|bool $serviceValue = NULL
     * @return NewShipmentEnity
     */
    public function updateService($serviceKey, $serviceValue = NULL) {
        
        if( isset($this->services[$serviceKey]) ) {
           $this->services[$serviceKey] = $serviceValue; 
        } 
        
        return $this;
    }
    
    /**
     * 
     * @return string
     */
    public function getMarketPlaceId() {
        return $this->marketPlaceId;
    }

    /**
     * 
     * @param string $marketPlaceId
     * @return $this
     */
    public function setMarketPlaceId($marketPlaceId) {
        $this->marketPlaceId = $marketPlaceId;
        return $this;
    }
    
    /**
     * 
     * @return string
     */
    public function getSenderCounty() {
        return $this->senderCounty;
    }

    /**
     * 
     * @return string
     */
    public function getRecipientCounty() {
        return $this->recipientCounty;
    }

    /**
     * 
     * @param string $senderCounty
     * @return $this
     */
    public function setSenderCounty($senderCounty) {
        $this->senderCounty = $senderCounty;
        return $this;
    }

    /**
     * 
     * @param string $recipientCounty
     * @return $this
     */
    public function setRecipientCounty($recipientCounty) {
        $this->recipientCounty = $recipientCounty;
        return $this;
    }
    
    /**
     * 
     * @return string
     */
    public function getDispatchPlaceId() {
        return $this->dispatchPlaceId;
    }

    /**
     * 
     * @param string $dispatchPlaceId
     * @return $this
     */
    public function setDispatchPlaceId($dispatchPlaceId) {
        $this->dispatchPlaceId = $dispatchPlaceId;
        return $this;
    }
    
    /**
     * 
     * @return bool
     */
    public function getRecipientWarehouseFlag() {
        return $this->recipientWarehouseFlag;
    }

    /**
     * 
     * @param bool $recipientWarehouseFlag
     * @return $this
     */
    public function setRecipientWarehouseFlag($recipientWarehouseFlag) {
        $this->recipientWarehouseFlag = $recipientWarehouseFlag;
        return $this;
    }

    /**
     * 
     * @return array
     */
    public function getCustoms(): array {
        return $this->customs;
    }

    /**
     * Internal structure according to the docummentation.
     * 
     * @param array $customs
     * @return $this
     */
    public function setCustoms(array $customs) {
        $this->customs = $customs;
        return $this;
    }
    
    /**
     * Internal structure according to the docummentation.
     * 
     * @param array $params
     * @return $this
     */
    public function setCustomsParams(array $params) {
        $this->customs['params'] = $params;
        return $this;
    }
    
    /**
     * Internal structure according to the docummentation.
     * 
     * @param array $items
     * @return $this
     */
    public function setCustomsItems(array $items) {
        $this->customs['items'] = $items;
        return $this;
    }
    
    /**
     * Internal structure according to the docummentation.
     * 
     * @param string $paramCode
     * @param mixed $paramValue
     * @return $this
     */
    public function addParamToCustoms($paramCode, $paramValue) {
        $this->customs['params'][$paramCode] = $paramValue;
        return $this;
    }
    
    /**
     * Internal structure according to the docummentation.
     * 
     * @param array $item
     * @return $this
     */
    public function addItemToCustoms(array $item) {
        $this->customs['items'][] = $item;
        return $this;
    }

                    
    /**
     * Convert object to formated array
     * @return array
     */
    public function getApiRequestStructure() {
        
        $out = Array();
        
        $out['apiCustomRef'] = $this->getApiCustomRef();
        
        $out['preset'] = Array(
            'senderCountry' => $this->getSenderCountry(),
            'recipientCountry' => $this->getRecipientCountry(),
            'speditionCode' => $this->getSpeditionCode(),
            'shipmentType' => $this->getShipmentType(),
            'senderId' => $this->getSenderId(),
        );
        
        $out['sender'] = Array(
            'senderName' => $this->getSenderName(),
            'senderAddress' => $this->getSenderAddress(),
            'senderCity' => $this->getSenderCity(),
            'senderZipcode' => $this->getSenderZipcode(),
            'senderContactPerson' => $this->getSenderContactPerson(),
            'senderEmail' => $this->getSenderEmail(),
            'senderPhone' => $this->getSenderPhone(),
            'senderCounty' => $this->getSenderCounty(),
            'dispatchPlaceId' => $this->getDispatchPlaceId(),
        );
        
        $out['recipient'] = Array(
            'recipientWarehouseFlag' => $this->getRecipientWarehouseFlag(),
            'recipientFirstname' => $this->getRecipientFirstname(),
            'recipientSurname' => $this->getRecipientSurname(),
            'recipientAddress' => $this->getRecipientAddress(),
            'recipientCity' => $this->getRecipientCity(),
            'recipientZipcode' => $this->getRecipientZipcode(),
            'recipientContactPerson' => $this->getRecipientContactPerson(),
            'recipientEmail' => $this->getRecipientEmail(),
            'recipientPhone' => $this->getRecipientPhone(),
            'recipientCounty' => $this->getRecipientCounty(),
            'pickupPlaceId' => $this->getPickupPlaceId(),
        );
        
        $out['services'] = $this->getServices();
        
        $out['cod'] = Array(
            'codAmount' => $this->getCodAmount(),
            'codReference' => $this->getCodReference(),
        );
        
        $out['packages'] = Array(
            'packageCount' => $this->getPackageCount(),
            'weight' => $this->getWeight(),
            'shipmentDescription' => $this->getShipmentDescription(),
        );
        
        $out['specific'] = Array(
            'pick' => $this->getPick(),
            'shipmentPickupDate' => $this->getShipmentPickupDate(),
            'marketPlaceId' => $this->getMarketPlaceId(),
        );
        
        $out['customs'] = $this->getCustoms();
        
        return $this->arrayFilterRecursive($out);
    }
}