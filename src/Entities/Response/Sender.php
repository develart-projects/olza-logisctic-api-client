<?php

namespace OlzaApiClient\Entities\Response;

/**
 * Parcel sender
 *
 */
class Sender
        implements ApiResponseAwareInterface

{
    
    /**
     *
     * @var string 
     */
    protected $senderId = '';
    
    /**
     *
     * @var string
     */
    protected $senderName = '';
    
    /**
     *
     * @var string 
     */
    protected $senderAddress = '';
    
    /**
     *
     * @var string 
     */
    protected $senderCity = '';
    
    /**
     *
     * @var string 
     */
    protected $senderZipcode = '';

    /**
     *
     * @var mixed 
     */
    protected $senderCounty;
    
    /**
     *
     * @var string 
     */
    protected $senderContactPerson = '';
    
    /**
     *
     * @var string 
     */
    protected $senderPhone = '';
    
    /**
     *
     * @var string 
     */
    protected $senderEmail = '';

    
    /**
     * 
     * @return string
     */
    public function getSenderId() {
        return $this->senderId;
    }

    /**
     * 
     * @return string
     */
    public function getSenderName() {
        return $this->senderName;
    }

    /**
     * 
     * @return string
     */
    public function getSenderAddress() {
        return $this->senderAddress;
    }

    /**
     * 
     * @return string
     */
    public function getSenderCity() {
        return $this->senderCity;
    }

    /**
     * 
     * @return string
     */
    public function getSenderZipcode() {
        return $this->senderZipcode;
    }

    /**
     * 
     * @return mixed
     */
    public function getSenderCounty() {
        return $this->senderCounty;
    }
    
    /**
     * 
     * @return bool
     */
    public function hasSenderCounty() {
        return empty($this->senderCounty) === FALSE;
    }

    /**
     * 
     * @return string
     */
    public function getSenderContactPerson() {
        return $this->senderContactPerson;
    }

    /**
     * 
     * @return string
     */
    public function getSenderPhone() {
        return $this->senderPhone;
    }

    /**
     * 
     * @return string
     */
    public function getSenderEmail() {
        return $this->senderEmail;
    }

    /**
     * 
     * @param string $senderId
     * @return $this
     */
    public function setSenderId($senderId) {
        $this->senderId = $senderId;
        return $this;
    }

    /**
     * 
     * @param string $senderName
     * @return $this
     */
    public function setSenderName($senderName) {
        $this->senderName = $senderName;
        return $this;
    }

    /**
     * 
     * @param string $senderAddress
     * @return $this
     */
    public function setSenderAddress($senderAddress) {
        $this->senderAddress = $senderAddress;
        return $this;
    }

    /**
     * 
     * @param string $senderCity
     * @return $this
     */
    public function setSenderCity($senderCity) {
        $this->senderCity = $senderCity;
        return $this;
    }

    /**
     * 
     * @param string $senderZipcode
     * @return $this
     */
    public function setSenderZipcode($senderZipcode) {
        $this->senderZipcode = $senderZipcode;
        return $this;
    }

    /**
     * 
     * @param mixed $senderCounty
     * @return $this
     */
    public function setSenderCounty( $senderCounty) {
        $this->senderCounty = $senderCounty;
        return $this;
    }

    /**
     * 
     * @param string $senderContactPerson
     * @return $this
     */
    public function setSenderContactPerson($senderContactPerson) {
        $this->senderContactPerson = $senderContactPerson;
        return $this;
    }

    /**
     * 
     * @param string $senderPhone
     * @return $this
     */
    public function setSenderPhone($senderPhone) {
        $this->senderPhone = $senderPhone;
        return $this;
    }

    /**
     * 
     * @param string $senderEmail
     * @return $this
     */
    public function setSenderEmail($senderEmail) {
        $this->senderEmail = $senderEmail;
        return $this;
    }

    
    /**
     * Load data to output Shipment entity 
     * 
     * @param array $data
     * @return Shipment
     */
    public static function fromApiData($data) {
        
        $entity = new self();
        
        if( !empty($data['senderName']) ) {
            $entity->setSenderName($data['senderName']);
        }
        
        if( !empty($data['senderAddress']) ) {
            $entity->setSenderAddress($data['senderAddress']);
        }
        
        if( !empty($data['senderCity']) ) {
            $entity->setSenderCity($data['senderCity']);
        }
        
        if( !empty($data['senderZipcode']) ) {
            $entity->setSenderZipcode($data['senderZipcode']);
        }
        
        if( !empty($data['senderContactPerson']) ) {
            $entity->setSenderContactPerson($data['senderContactPerson']);
        }
        
        if( !empty($data['senderEmail']) ) {
            $entity->setSenderEmail($data['senderEmail']);
        }
       
        if( !empty($data['senderPhone']) ) {
            $entity->setSenderPhone($data['senderPhone']);
        }
        
        if( !empty($data['senderCounty']) ) {
            $entity->setSenderCounty($data['senderCounty']);
        }
         
        return $entity;
        
    }
}
