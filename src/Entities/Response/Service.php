<?php

namespace OlzaApiClient\Entities\Response;

/**
 * Generic single Shipment service entity
 */
class Service
        implements ApiResponseAwareInterface
{

    
     /**
     *
     * @var string 
     */
    protected $code = '';
    
    /**
     *
     * @var mixed 
     */
    protected $value = '';
    
    /**
     *
     * @var float
     */
    protected $billingPrice = 0.0;
    
    /**
     * 
     * @param string $code
     */
    public function __construct($code = '') {
        $this->code = $code;
    }

        /**
     * 
     * @return string
     */
    public function getCode() {
        return $this->code;
    }

    /**
     * 
     * @param string $code
     * @return $this
     */
    public function setCode($code) {
        $this->code = $code;
        return $this;
    }
    
    /**
     * 
     * @return mixed
     */
    public function getValue() {
        return $this->value;
    }

    /**
     * 
     * @param mixed $value
     * @return $this
     */
    public function setValue($value) {
        $this->value = $value;
        return $this;
    }

    /**
     * 
     * @return float
     */
    public function getBillingPrice() {
        return $this->billingPrice;
    }

    /**
     * 
     * @param float $billingPrice
     * @return $this
     */
    public function setBillingPrice($billingPrice) {
        $this->billingPrice = $billingPrice;
        return $this;
    }
    
    /**
     * Check if service has value
     * @return bool
     */
    public function hasValue() {
        return empty($this->getValue()) == FALSE;
    }

        
    /**
     * Load data to output entity
     * @param array $data
     * @return Service
     */
    public static function fromApiData($data) {
        
        $entity = new self();
        
        if( !empty($data['code']) ) {
            $entity->setCode($data['code']);
        }
        
        if( !empty($data['value']) ) {
            $entity->setValue($data['value']);
        }
        
        if( !empty($data['billingPrice']) ) {
            $entity->setBillingPrice($data['billingPrice']);
        }
        
        return $entity;
        
    }


}
