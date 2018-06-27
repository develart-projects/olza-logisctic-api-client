<?php

namespace OlzaApiClient\Entities\Response;

use ArrayObject;


/**
 * List of returned errors
 */
class ErrorList extends ArrayObject
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
     * Convert API errors into exception objects (entities)
     * @param array $data
     * @return ErrorList
     */
    public static function fromApiData($data) {
        
        // result object
        $container = new self();
        
        // no errors
        if( empty($data['list_error']) || !is_array($data['list_error']) ) {
            return $container; 
        }
        
        // attach errors
        foreach($data['list_error'] as $ref => $error) {
                
            $apiException = ResponseExceptionFactory::createException($error);
            $container->offsetSet($ref, $apiException);

        }
        
        return $container;
        
    }

}