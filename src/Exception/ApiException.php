<?php

namespace OlzaApiClient\Exception;

use Exception;

/**
 * Generic API exception
 */
abstract class ApiException extends Exception
{
    
    // specific RCs
    const ERROR_CODE_VALIDATION = 900;
    const ERROR_CODE_SPEDITION = 901;    
    
    /**
     * Request identification (primary key of request)
     * @var mixed
     */
    protected $referenceId = NULL;
    
    /**
     * Request identification (primary key of request)
     * @return mixed
     */
    public function getReferenceId() {
        return $this->referenceId;
    }

    /**
     * 
     * @param type $referenceId
     * @return ErrorValidation
     */
    public function setReferenceId($referenceId) {
        $this->referenceId = $referenceId;
        return $this;
    }
    
    /**
     * 
     * @return string
     */
    public function __toString() {
        return $this->getMessage();
    } 
    
    /**
     * Create exception from returned API status response
     * @param array $errorData
     * @return ApiException
     */
    public static function createFromApiStatus(array $errorData) {

        $message = '';
        $code = 0;
        
        if( !empty($errorData['responseCode']) ) {
            $code = $errorData['responseCode'];
        }
        
        if( !empty($errorData['responseDescription']) ) {
            $message = $errorData['responseDescription'];
        }
        
        $e = new static($message, $code);
        
        if( !empty($errorData['apiCustomRef']) ) {
            $e->setReferenceId( $errorData['apiCustomRef'] );
        }
        
        return $e;
    }
    
    
}