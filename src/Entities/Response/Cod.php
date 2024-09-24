<?php

namespace OlzaApiClient\Entities\Response;

/**
 * Generic single Parcel output entity
 */
class Cod
        implements ApiResponseAwareInterface
{

    /**
     * 
     * @var float
     */
    protected $codAmount = 0;
    
    /**
     * 
     * @var string
     */
    protected $codReference;
    
    /**
     * 
     * @var string
     */
    protected $codCurrency;
    
    /**
     * 
     * @var bool
     */
    protected $codConfirmed = FALSE;
    
    /**
     * 
     * @return float
     */
    public function getCodAmount() {
        return $this->codAmount;
    }

    /**
     * 
     * @return string
     */
    public function getCodReference() {
        return $this->codReference;
    }

    /**
     * 
     * @return string
     */
    public function getCodCurrency() {
        return $this->codCurrency;
    }

    /**
     * 
     * @return bool
     */
    public function isCodConfirmed() {
        return $this->codConfirmed;
    }

    /**
     * 
     * @param float $codAmount
     * @return $this
     */
    public function setCodAmount($codAmount) {
        $this->codAmount = $codAmount;
        return $this;
    }

    /**
     * 
     * @param string $codReference
     * @return $this
     */
    public function setCodReference($codReference) {
        $this->codReference = $codReference;
        return $this;
    }

    /**
     * 
     * @param string $codCurrency
     * @return $this
     */
    public function setCodCurrency($codCurrency) {
        $this->codCurrency = $codCurrency;
        return $this;
    }

    /**
     * 
     * @return $this
     */
    public function setCodConfirmed() {
        $this->codConfirmed = TRUE;
        return $this;
    }

    /**
     * 
     * @return $this
     */
    public function setCodUnconfirmed() {
        $this->codConfirmed = FALSE;
        return $this;
    }
        
    /**
     * Load data to output Billing data entity
     * @param array $data
     * @return Cod
     */
    public static function fromApiData($data) {
        
        $entity = new self();
        
        if( !empty($data['codAmount']) ) {
            $entity->setCodAmount($data['codAmount']);
        }
        
        if( !empty($data['codReference']) ) {
            $entity->setCodReference($data['codReference']);
        }
        
        if( !empty($data['codCurrency']) ) {
            $entity->setCodCurrency($data['codCurrency']);
        }
        
        if( !empty($data['codConfirmed']) ) {
            $entity->setCodConfirmed();
        }
              
        return $entity;
        
    }


}
