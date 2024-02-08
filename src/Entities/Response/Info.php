<?php

namespace OlzaApiClient\Entities\Response;

/**
 * Container for different info msg codes
 */
class Info 
{

    const DELIVERY_TO_ISLAND = 1;
    const DELIVERY_TO_RESTRICTED_AREA = 2; 
    
    
    /**
     *
     * @var int
     */
    protected $code;
    
    /**
     * 
     * @var string
     */
    protected $message;
    
    /**
     * 
     * @param int $code
     * @param string $message
     */
    public function __construct($code, $message) {
        $this->code = $code;
        $this->message = $message;
    }

    
    /**
     * 
     * @return int
     */
    public function getCode(): int {
        return $this->code;
    }

    /**
     * 
     * @return string
     */
    public function getMessage(): string {
        return $this->message;
    }


    
}
