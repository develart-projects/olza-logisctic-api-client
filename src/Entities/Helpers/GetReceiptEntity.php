<?php

namespace OlzaApiClient\Entities\Helpers;

/**
 * API get statuses data entity
 */
class GetReceiptEntity extends AbstractShipmentList
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