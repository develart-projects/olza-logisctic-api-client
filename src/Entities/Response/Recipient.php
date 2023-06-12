<?php

namespace OlzaApiClient\Entities\Response;

/**
 * Parcel recipient
 *
 */
class Recipient
        implements ApiResponseAwareInterface

{
    
    /**
     *
     * @var string 
     */
    protected $recipientId = '';
    
    /**
     *
     * @var string
     */
    protected $recipientFirstname = '';
    
    /**
     *
     * @var string
     */
    protected $recipientSurname = '';
    
    /**
     *
     * @var string 
     */
    protected $recipientAddress = '';
    
    /**
     *
     * @var string 
     */
    protected $recipientCity = '';
    
    /**
     *
     * @var string 
     */
    protected $recipientZipcode = '';

    /**
     *
     * @var string 
     */
    protected $recipientCounty;
    
    /**
     *
     * @var string 
     */
    protected $recipientContactPerson = '';
    
    /**
     *
     * @var string 
     */
    protected $recipientPhone = '';
    
    /**
     *
     * @var string 
     */
    protected $recipientEmail = '';
    
    /**
     * 
     * @var string
     */
    protected $pickupPlaceId = '';

    
    /**
     * 
     * @return string
     */
    public function getRecipientId() {
        return $this->recipientId;
    }

    /**
     * 
     * @return string
     */
    public function getRecipientFirstname() {
        return $this->recipientFirstname;
    }
    
    /**
     * 
     * @return string
     */
    public function getRecipientSurname() {
        return $this->recipientSurname;
    }

    
    /**
     * 
     * @return string
     */
    public function getRecipientAddress() {
        return $this->recipientAddress;
    }

    /**
     * 
     * @return string
     */
    public function getRecipientCity() {
        return $this->recipientCity;
    }

    /**
     * 
     * @return string
     */
    public function getRecipientZipcode() {
        return $this->recipientZipcode;
    }

    /**
     * 
     * @return mixed
     */
    public function getRecipientCounty() {
        return $this->recipientCounty;
    }

    /**
     * 
     * @return string
     */
    public function getRecipientContactPerson() {
        return $this->recipientContactPerson;
    }

    /**
     * 
     * @return string
     */
    public function getRecipientPhone() {
        return $this->recipientPhone;
    }

    /**
     * 
     * @return string
     */
    public function getRecipientEmail() {
        return $this->recipientEmail;
    }

    /**
     * 
     * @param string $recipientId
     * @return $this
     */
    public function setRecipientId($recipientId) {
        $this->recipientId = $recipientId;
        return $this;
    }

    /**
     * 
     * @param string $recipientFirstname
     * @return $this
     */
    public function setRecipientFirstname($recipientFirstname) {
        $this->recipientFirstname = $recipientFirstname;
        return $this;
    }
    
    /**
     * 
     * @param string $recipientSurname
     * @return $this
     */
    public function setRecipientSurname($recipientSurname) {
        $this->recipientSurname = $recipientSurname;
        return $this;
    }
    
    /**
     * 
     * @param string $recipientAddress
     * @return $this
     */
    public function setRecipientAddress($recipientAddress) {
        $this->recipientAddress = $recipientAddress;
        return $this;
    }

    /**
     * 
     * @param string $recipientCity
     * @return $this
     */
    public function setRecipientCity($recipientCity) {
        $this->recipientCity = $recipientCity;
        return $this;
    }

    /**
     * 
     * @param string $recipientZipcode
     * @return $this
     */
    public function setRecipientZipcode($recipientZipcode) {
        $this->recipientZipcode = $recipientZipcode;
        return $this;
    }

    /**
     * 
     * @param string $recipientCounty
     * @return $this
     */
    public function setRecipientCounty($recipientCounty) {
        $this->recipientCounty = $recipientCounty;
        return $this;
    }

    /**
     * 
     * @param string $recipientContactPerson
     * @return $this
     */
    public function setRecipientContactPerson($recipientContactPerson) {
        $this->recipientContactPerson = $recipientContactPerson;
        return $this;
    }

    /**
     * 
     * @param string $recipientPhone
     * @return $this
     */
    public function setRecipientPhone($recipientPhone) {
        $this->recipientPhone = $recipientPhone;
        return $this;
    }

    /**
     * 
     * @param string $recipientEmail
     * @return $this
     */
    public function setRecipientEmail($recipientEmail) {
        $this->recipientEmail = $recipientEmail;
        return $this;
    }
    
    /**
     * 
     * @return string
     */
    public function getPickupPlaceId() {
        return $this->pickupPlaceId;
    }

    /**
     * 
     * @param string $pickupPlaceId
     * @return $this
     */
    public function setPickupPlaceId($pickupPlaceId) {
        $this->pickupPlaceId = $pickupPlaceId;
        return $this;
    }

        
    /**
     * Assebmled
     * @return string
     */
    public function getRecipientFullname() {
        return "{$this->getRecipientFirstname()} {$this->getRecipientSurname()}";
    }
    
    /**
     * Assebmled - reversed (surname first)
     * @return string
     */
    public function getRecipientFullnameReversed() {
        return "{$this->getRecipientSurname()} {$this->getRecipientFirstname()}";
    }
    
    /**
     * 
     * @return bool
     */
    public function hasRecipientEmail() {
        return empty($this->getRecipientEmail()) === FALSE;
    }
    
    /**
     * 
     * @return bool
     */
    public function hasRecipientPhone() {
        return empty($this->getRecipientPhone()) === FALSE;
    }
    
    /**
     * 
     * @return bool
     */
    public function hasRecipientAddress() {
        return empty($this->getRecipientAddress()) === FALSE;
    }
    
    /**
     * 
     * @return bool
     */
    public function hasRecipientCity() {
        return empty($this->getRecipientCity()) === FALSE;
    }
    
    /**
     * 
     * @return bool
     */
    public function hasRecipientZipcode() {
        return empty($this->getRecipientZipcode()) === FALSE;
    }
       
    /**
     * Load data to output Shipment entity 
     * 
     * @param array $data
     * @return Shipment
     */
    public static function fromApiData($data) {
        
        $entity = new self();
        
        if( !empty($data['recipientFirstname']) ) {
            $entity->setRecipientFirstname($data['recipientFirstname']);
        }
        
        if( !empty($data['recipientSurname']) ) {
            $entity->setRecipientSurname($data['recipientSurname']);
        }
        
        if( !empty($data['recipientAddress']) ) {
            $entity->setRecipientAddress($data['recipientAddress']);
        }
        
        if( !empty($data['recipientCity']) ) {
            $entity->setRecipientCity($data['recipientCity']);
        }
        
        if( !empty($data['recipientZipcode']) ) {
            $entity->setRecipientZipcode($data['recipientZipcode']);
        }
        
        if( !empty($data['recipientContactPerson']) ) {
            $entity->setRecipientContactPerson($data['recipientContactPerson']);
        }
       
        if( !empty($data['recipientEmail']) ) {
            $entity->setRecipientEmail($data['recipientEmail']);
        }
        
        if( !empty($data['recipientPhone']) ) {
            $entity->setRecipientPhone($data['recipientPhone']);
        }
        
        if( !empty($data['recipientCounty']) ) {
            $entity->setRecipientCounty($data['recipientCounty']);
        }
        
        if( !empty($data['pickupPlaceId']) ) {
            $entity->setPickupPlaceId($data['pickupPlaceId']);
        }
         
        return $entity;
        
    }
    
    
}
