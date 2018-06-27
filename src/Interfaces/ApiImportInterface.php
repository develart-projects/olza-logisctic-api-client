<?php

namespace OlzaApiClient\Interfaces;

/**
 * Interface to communicate with API
 */
interface ApiImportInterface {
    
    /**
     * Convert object to formated array
     * @return array
     */
    public function getApiRequestStructure();
    
    
}
