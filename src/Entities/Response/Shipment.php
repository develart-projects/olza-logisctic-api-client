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
     * Parcel list init
     */
    public function __construct() {
        $this->parcels = new ParcelList;
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
    
}
