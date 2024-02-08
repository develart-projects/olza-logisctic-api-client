<?php

namespace OlzaApiClient\Entities\Response;

/**
 * Generic single Shipment output entity
 */
class Shipment
        implements ApiResponseAwareInterface
{
    
    /**
     *
     * @var ParcelList 
     */
    protected $parcels;
    
    /**
     *
     * @var ServiceList 
     */
    protected $services;
    
    /**
     *
     * @var string
     */
    protected $apiCustomRef = NULL;
    
    /**
     *
     * @var string 
     */
    protected $shipmentId;
    
    /**
     *
     * @var string 
     */
    protected $shipmentStatus;
    
    /**
     * 
     * @var Billing
     */
    protected $billingData;
    
    /**
     * 
     * @var Sender
     */
    protected $sender;
    
    /**
     * 
     * @var Recipient
     */
    protected $recipient;
    
    /**
     * 
     * @var Cod
     */
    protected $cod;
    
    /**
     * 
     * @var Preset
     */
    protected $preset;
    
    /**
     * 
     * @var SpecificData
     */
    protected $specific;
    
    /**
     * 
     * @var PackagesSummary
     */
    protected $packagesSummary;
    
    /**
     * 
     * @var InfoList
     */
    protected $infoMessages;
    
    /**
     * Parcel list init
     */
    public function __construct() {
        
        $this->parcels = new ParcelList;
        $this->billingData = new Billing;
        $this->sender = new Sender;
        $this->recipient = new Recipient;
        $this->services = new ServiceList;
        $this->cod = new Cod;
        $this->preset = new Preset;
        $this->specific = new SpecificData;
        $this->packagesSummary = new PackagesSummary;
        $this->infoMessages = new InfoList;
    }

    
    /**
     * Add single parcel to the actual list entity
     * @param Parcel $parcel
     */
    public function addParcel(Parcel $parcel) {
        $this->parcels->addParcel($parcel);
    }
    
    /**
     * Get all parcels of shipment
     * @return ParcelList
     */
    public function getParcels() {
        return $this->parcels;
    }
    
    /**
     * 
     * @param ParcelList $parcels
     * @return Shipment
     */
    public function setParcels(ParcelList $parcels) {
        $this->parcels = $parcels;
        return $this;
    }
    
    /**
     * 
     * @return ServiceList
     */
    public function getServices() {
        return $this->services;
    }

    /**
     * 
     * @param ServiceList $services
     * @return $this
     */
    public function setServices(ServiceList $services) {
        $this->services = $services;
        return $this;
    }

        
    /**
     * All available billing data
     * @return Billing
     */
    public function getBillingData() {
        return $this->billingData;
    }

    /**
     * 
     * @param Billing $billingData
     * @return $this
     */
    public function setBillingData(Billing $billingData) {
        $this->billingData = $billingData;
        return $this;
    }
    
    /**
     * 
     * @return Sender
     */
    public function getSender() {
        return $this->sender;
    }

    /**
     * 
     * @return Recipient
     */
    public function getRecipient() {
        return $this->recipient;
    }

    /**
     * 
     * @param Sender $sender
     * @return $this
     */
    public function setSender(Sender $sender) {
        $this->sender = $sender;
        return $this;
    }

    /**
     * 
     * @param Recipient $recipient
     * @return $this
     */
    public function setRecipient(Recipient $recipient) {
        $this->recipient = $recipient;
        return $this;
    }
    
    /**
     * 
     * @return Cod
     */
    public function getCod() {
        return $this->cod;
    }

    /**
     * 
     * @return Preset
     */
    public function getPreset() {
        return $this->preset;
    }

    /**
     * 
     * @param Cod $cod
     * @return $this
     */
    public function setCod(Cod $cod) {
        $this->cod = $cod;
        return $this;
    }

    /**
     * 
     * @param Preset $preset
     * @return $this
     */
    public function setPreset(Preset $preset) {
        $this->preset = $preset;
        return $this;
    }
    
    /**
     * 
     * @return SpecificData
     */
    public function getSpecific() {
        return $this->specific;
    }

    /**
     * 
     * @return PackagesSummary
     */
    public function getPackagesSummary() {
        return $this->packagesSummary;
    }

    /**
     * 
     * @param SpecificData $specific
     * @return $this
     */
    public function setSpecific(SpecificData $specific) {
        $this->specific = $specific;
        return $this;
    }

    /**
     * 
     * @param PackagesSummary $packagesSummary
     * @return $this
     */
    public function setPackagesSummary(PackagesSummary $packagesSummary) {
        $this->packagesSummary = $packagesSummary;
        return $this;
    }
    
               
    /**
     * Load data to output Shipment entity 
     * 
     * @param array $data
     * @return Shipment
     */
    public static function fromApiData($data) {
       
        $shipment = new self();
        
        if( !empty($data['apiCustomRef']) ) {
            $shipment->setApiCustomRef($data['apiCustomRef']);
        }
        
        if( !empty($data['shipmentId']) ) {
            $shipment->setShipmentId($data['shipmentId']);
        }
        
        if( !empty($data['shipmentStatus']) ) {
            $shipment->setShipmentStatus($data['shipmentStatus']);
        }
       
        if( !empty($data['packageIds']) ) {
            $shipment->getParcels()->addParcels( ParcelList::fromIdVector($data['packageIds'], Parcel::PARCEL_TYPE_NORMAL));
        }
        
        if( !empty($data['exchangePackageIds']) ) {
            $shipment->getParcels()->addParcels( ParcelList::fromIdVector($data['exchangePackageIds'], Parcel::PARCEL_TYPE_EXCHANGE));
        }
        
        if( !empty($data['packageList']) ) {
            $shipment->setParcels( ParcelList::fromApiData( $data['packageList'] ) );
        }
        
        if( !empty($data['billingData']) ) {
            $shipment->setBillingData( Billing::fromApiData( $data['billingData'] ) );
        }
        
        if( !empty($data['sender']) ) {
            $shipment->setSender( Sender::fromApiData( $data['sender'] ) );
        }
        
        if( !empty($data['recipient']) ) {
            $shipment->setRecipient(Recipient::fromApiData( $data['recipient'] ) );
        }
        
        if( !empty($data['services']) ) {
            $shipment->setServices(ServiceList::fromApiData( $data['services'] ) );
        }
        
        if( !empty($data['preset']) ) {
            $shipment->setPreset( Preset::fromApiData( $data['preset'] ) );
        }
        
        if( !empty($data['cod']) ) {
            $shipment->setCod( Cod::fromApiData( $data['cod'] ) );
        }
        
        if( !empty($data['specific']) ) {
            $shipment->setSpecific( SpecificData::fromApiData( $data['specific'] ) );
        }
        
        if( !empty($data['packages']) ) {
            $shipment->setPackagesSummary( PackagesSummary::fromApiData( $data['packages'] ) );
        }
        
        if( !empty($data['infoMessages']) ) {
            $shipment->setInfoMessages( InfoList::fromApiData( $data['infoMessages'] ) );
        }
         
        return $shipment;
        
    }
    
    /**
     * 
     * @return string
     */
    public function getApiCustomRef() {
        return $this->apiCustomRef;
    }

    /**
     * 
     * @param string $customRef
     * @return Shipment
     */
    public function setApiCustomRef($customRef) {
        $this->apiCustomRef = $customRef;
        return $this;
    }
    
    /**
     * 
     * @return bool
     */
    public function hasApiCustomRef() {
        return empty($this->getApiCustomRef()) === FALSE;
    }

    /**
     * 
     * @return string
     */
    public function getShipmentId() {
        return $this->shipmentId;
    }

    /**
     * 
     * @param string $shipmentId
     * @return Shipment
     */
    public function setShipmentId($shipmentId) {
        $this->shipmentId = $shipmentId;
        return $this;
    }
    
    /**
     * 
     * @return string
     */
    public function getShipmentStatus() {
        return $this->shipmentStatus;
    }

    /**
     * 
     * @param sting $shipmentStatus
     * @return Shipment
     */
    public function setShipmentStatus($shipmentStatus) {
        $this->shipmentStatus = $shipmentStatus;
        return $this;
    }
    
    /**
     * 
     * @return InfoList
     */
    public function getInfoMessages(): InfoList {
        return $this->infoMessages;
    }

    /**
     * 
     * @param InfoList $infoMessages
     * @return $this
     */
    public function setInfoMessages(InfoList $infoMessages) {
        $this->infoMessages = $infoMessages;
        return $this;
    }


    
}
