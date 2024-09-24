<?php

namespace OlzaApiClient\Entities\Response;

/**
 * Generic single Parcel output entity
 */
class Preset
        implements ApiResponseAwareInterface
{

    /**
     * 
     * @var string
     */
    protected $senderCountry;
    
    /**
     * 
     * @var string
     */
    protected $recipientCountry;
    
    /**
     * 
     * @var string
     */
    protected $speditionCode;
    
    /**
     * 
     * @var string
     */
    protected $shipmentType;
    
    /**
     * 
     * @return string
     */
    public function getSenderCountry() {
        return $this->senderCountry;
    }

    /**
     * 
     * @return string
     */
    public function getRecipientCountry() {
        return $this->recipientCountry;
    }

    /**
     * 
     * @return string
     */
    public function getSpeditionCode() {
        return $this->speditionCode;
    }

    /**
     * 
     * @return string
     */
    public function getShipmentType() {
        return $this->shipmentType;
    }

    /**
     * 
     * @param string $senderCountry
     * @return $this
     */
    public function setSenderCountry($senderCountry) {
        $this->senderCountry = $senderCountry;
        return $this;
    }

    /**
     * 
     * @param string $recipientCountry
     * @return $this
     */
    public function setRecipientCountry($recipientCountry) {
        $this->recipientCountry = $recipientCountry;
        return $this;
    }

    /**
     * 
     * @param string $speditionCode
     * @return $this
     */
    public function setSpeditionCode($speditionCode) {
        $this->speditionCode = $speditionCode;
        return $this;
    }

    /**
     * 
     * @param string $shipmentType
     * @return $this
     */
    public function setShipmentType($shipmentType) {
        $this->shipmentType = $shipmentType;
        return $this;
    }

        
    /**
     * Load data to output Billing data entity
     * @param array $data
     * @return Preset
     */
    public static function fromApiData($data) {
        
        $entity = new self();
        
        if( !empty($data['senderCountry']) ) {
            $entity->setSenderCountry($data['senderCountry']);
        }
        
        if( !empty($data['recipientCountry']) ) {
            $entity->setRecipientCountry($data['recipientCountry']);
        }
        
        if( !empty($data['speditionCode']) ) {
            $entity->setSpeditionCode($data['speditionCode']);
        }
        
        if( !empty($data['shipmentType']) ) {
            $entity->setShipmentType($data['shipmentType']);
        }
              
        return $entity;
        
    }


}
