<?php

namespace OlzaApiClient\Entities\Helpers;

/**
 * Generic Helper Entity for shipment list methods
 */
abstract class AbstractShipmentList extends AbstractHelper
{
   
    /**
     *
     * @var array 
     */
    protected $shipmentList = Array();
    
    /**
     * Attach ShipmentID to the list
     * @param string|int $shipmentId
     * @return $this
     */
    public function addShipmentId($shipmentId) {
        
        $this->shipmentList[] = $shipmentId;
        
        return $this;
    }
    
    /**
     * Remove shipmentId from the list
     * @param string|int $shipmentId
     */
    public function removeshipmentId($shipmentId) {
        unset( $this->shipmentList[array_search($shipmentId, $this->shipmentList)] );
        return $this;
    }
    
    /**
     * 
     * @return array
     */
    public function getShipmentList() {
        return $this->shipmentList;
    }
    
    /**
     * Add more IDs to list by vector of IDs
     * @param array $idVector
     * @return $this
     */
    public function addToListFromArray(array $idVector) {
        $this->shipmentList = array_merge($this->shipmentList, $idVector);
        return $this;
    }
    
    /**
     * Set list of shipments directly as array vector
     * @param array $idVector
     */
    public function setListFromArray(array $idVector) {
        $this->shipmentList = $idVector;
        return $this;
    }
    
}
