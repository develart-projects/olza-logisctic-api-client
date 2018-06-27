<?php

namespace OlzaApiClient\Entities\Response;

use OlzaApiClient\Exception;

/**
 * Factory pattern to create exception type, based on return code from API
 */
class ResponseExceptionFactory
{    
    
    /**
     * Create exception by API response for specific shipment/request, identified by reference/ident. ID
     * 
     * @param array $errorData
     * @return Exception\ApiException
     * @throws Exception\ApiClientException
     */
    public static function createException(array $errorData) {
        
        if( empty($errorData['responseCode']) ) {
            throw new Exception\ResponseException('Missing response code.');
        }
        
        if( empty($errorData['apiCustomRef']) ) {
            throw new Exception\ResponseException('Missing apiCustomRef.');
        }
        
        switch($errorData['responseCode']) {
            
            case Exception\ApiException::ERROR_CODE_VALIDATION:
                return Exception\ValidationException::createFromApiStatus($errorData);
                
            case Exception\ApiException::ERROR_CODE_SPEDITION:
                return Exception\SpeditionException::createFromApiStatus($errorData);    
                
            default:
                return Exception\ProcessingException::createFromApiStatus($errorData);  
            
        }        
        
    }

}
