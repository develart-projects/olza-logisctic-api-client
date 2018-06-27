<?php

namespace OlzaApiClient\Entities\Helpers;

use OlzaApiClient\Interfaces\ApiImportInterface;

/**
 * Generic Helper Entity methods
 */
abstract class AbstractHelper
    implements ApiImportInterface
{
   
    
    /**
     * Autopopulate function is populating values using setters, accept array key as mathods.
     * We can use directly var name like valueXyz or underscore like value_xyz
     * Input array must be flat array - method is not recursive
     * 
     * @param array $inputArray
     * @param boolean $skipEmpty = TRUE
     * @param array $skipKeys = []
     */
    public function autoPopulate(array $inputArray, $skipEmpty = TRUE, array $skipKeys = Array()) {
        
        foreach($inputArray as $key => $value) {
                
            // skip empty
            if($skipEmpty && empty($value) ) {
                continue;
            }
            
            // skip specific keys
            if(in_array($key, $skipKeys)) {
                continue;
            }

            $method = 'set' . $this->convertToCamelCase($key); // setter 

            if (!method_exists($this, $method)) { // exists ?
                continue;
            }

            $this->$method($value); // value via setter
        }
        
    }
   
    /**
     * Converts the input key into a valid Setter Method Name
     *
     * @param string $key
     * @return string
     */
    protected function convertToCamelCase($key) {
        return str_replace(' ', '', ucwords(str_replace(array('_', '-'), ' ', $key)));
    }
    
    /**
     * Remove empty values by recursice search
     * @param array $haystack
     * @return array
     */
    protected function arrayFilterRecursive($haystack) {
        
        foreach ($haystack as $key => $value) {
            if(is_array($value)) {
                $haystack[$key] = $this->arrayFilterRecursive($haystack[$key]);
            }

            if(empty($haystack[$key])) {
                unset($haystack[$key]);
            }
        }

        return $haystack;
    }
}
