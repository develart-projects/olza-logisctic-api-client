<?php

namespace OlzaApiClient\Entities\Response;

/**
 * Create and fill object from Olza API response data
 */
interface ApiResponseAwareInterface {
    
    /**
     * Build and fill object from returned API data
     * @param $data $data
     * @return object
     */
    public static function fromApiData($data);
}
