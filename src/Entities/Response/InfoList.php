<?php

namespace OlzaApiClient\Entities\Response;

use ArrayObject;


/**
 * List of additional info messages
 */
class InfoList extends ArrayObject
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
     * Convert API info pool into info objects (entities)
     * @param array $data
     * @return InfoList
     */
    public static function fromApiData($data) {
        
        // result object
        $container = new self();
        
        // no errors
        if( empty($data) || !is_array($data) ) {
            return $container; 
        }
        
        // attach errors
        foreach($data as $code => $msg) {
                
            $info = new Info($code, $msg);
            $container->append($info);

        }
        
        return $container;
        
    }

}