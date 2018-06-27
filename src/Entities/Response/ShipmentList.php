<?php

namespace OlzaApiClient\Entities\Response;

/**
 * List of returned processed results
 */
class ShipmentList
        implements ApiResponseAwareInterface
{
    
    /**
     *
     * @var array
     */
    protected $shipmentList = Array();
    
    /**
     * Add single ahipment to the actual list entity
     * @param Shipment $shipment
     */
    public function addShipment(Shipment $shipment) {
        
        if($shipment->hasApiCustomRef()) {
            $this->shipmentList[$shipment->getApiCustomRef()] = $shipment;
        } else {
            $this->shipmentList[$shipment->getShipmentId()] = $shipment;
        }
        
    }
    
    /**
     * Load data to output shipmentList entity
     * 
     * @param array $data
     * @return ShipmentList
     */
    public static function fromApiData($data) {
        
        $shipmentList = new self();
       
        foreach($data as $shipmentData) {
            $shipmentList->addShipment( Shipment::fromApiData($shipmentData) );
        }
        
        return $shipmentList;        
    }
    
    /**
     * Get first Shipment entity from the list
     * @return Shipment
     */
    public function getFirstShipment() {
        return reset($this->shipmentList);
    }
    
    /**
     * Get array copy of list
     * @return array
     */
    public function toArray() {
        return $this->shipmentList;
    }
    
    /**
     * Count shipments
     * @return int
     */
    public function count() {
        return count($this->shipmentList);
    }
    
    

}
