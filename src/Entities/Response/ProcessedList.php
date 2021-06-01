<?php

namespace OlzaApiClient\Entities\Response;

use ArrayObject;

/**
 * List of returned correct responses - universal wrapper
 */
class ProcessedList extends ArrayObject
                        implements ApiResponseAwareInterface
{
    
    /**
     * Merge object to array
     * @return array
     */
    public function toArray() {
        
       return $this->getArrayCopy();

    }

    /**
     * Convert response payload to universal API response
     * @param array $data
     * @return ProcessedList
     * @ToDo Hydrate container by Factory, based on response type
     */
    public static function fromApiData($data) {
        
        // result object
        $container = new self();
        
        // no errors
        if( empty($data['list_processed']) || !is_array($data['list_processed']) ) {
            return $container; 
        }
        
        // hydrate with correct response object        
        $container->exchangeArray(
                    ShipmentList::fromApiData($data['list_processed'])->toArray()
                );

        return $container;
        
    }
    
    /**
     * Check wheter list of processed items has some of given id
     * @param mixed $id
     * @return bool
     */
    public function hasItemOfId($id) {
        return $this->offsetExists($id);
    }

}