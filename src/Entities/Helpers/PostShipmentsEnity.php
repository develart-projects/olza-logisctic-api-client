<?php

namespace OlzaApiClient\Entities\Helpers;

/**
 * API post shipments data entity
 */
class PostShipmentsEnity extends AbstractShipmentList
{
    
            
    /**
     * Convert object to formated array
     * @return array
     */
    public function getApiRequestStructure() {
        
        $out = Array();
        
        $out['shipmentList'] = $this->getShipmentList();
        
        return $this->arrayFilterRecursive($out);
    }
}