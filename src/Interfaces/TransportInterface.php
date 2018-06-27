<?php

namespace OlzaApiClient\Interfaces;

/**
 * Interface to communicate with API
 */
interface TransportInterface {
    
    /**
     * Execute POST request
     * 
     * @param string $apiCall
     * @param array $data = NULL
     * @return array
     */
    public function executePost($apiCall, array $data = NULL);
    
    /**
     * Execute POST request
     * 
     * @param string $apiCall
     * @return array
     */
    public function executeGet($apiCall);
    
    
}
