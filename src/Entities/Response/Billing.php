<?php

namespace OlzaApiClient\Entities\Response;

/**
 * Generic single Parcel output entity
 */
class Billing
        implements ApiResponseAwareInterface
{

    /**
     * 
     * @var float
     */
    protected $netPrice = 0;
    
    /**
     * 
     * @var int
     */
    protected $vatRate = 0;
    
    /**
     * 
     * @var string
     */
    protected $currency = '';
    
    /**
     * 
     * @return float
     */
    public function getNetPrice() {
        return $this->netPrice;
    }

    /**
     * 
     * @return int
     */
    public function getVatRate() {
        return $this->vatRate;
    }

    /**
     * 
     * @return string
     */
    public function getCurrency() {
        return $this->currency;
    }

    /**
     * 
     * @param float $netPrice
     * @return $this
     */
    public function setNetPrice($netPrice) {
        $this->netPrice = $netPrice;
        return $this;
    }

    /**
     * 
     * @param int $vatRate
     * @return $this
     */
    public function setVatRate($vatRate) {
        $this->vatRate = $vatRate;
        return $this;
    }

    /**
     * 
     * @param string $currency
     * @return $this
     */
    public function setCurrency($currency) {
        $this->currency = $currency;
        return $this;
    }

        
    /**
     * Load data to output Billing data entity
     * @param array $data
     * @return Billing
     */
    public static function fromApiData($data) {
        
        $billing = new self();
        
        if( !empty($data['netPrice']) ) {
            $billing->setNetPrice($data['netPrice']);
        }
        
        if( !empty($data['vatRate']) ) {
            $billing->setVatRate($data['vatRate']);
        }
        
        if( !empty($data['currency']) ) {
            $billing->setCurrency($data['currency']);
        }
        
              
        return $billing;
        
    }


}
