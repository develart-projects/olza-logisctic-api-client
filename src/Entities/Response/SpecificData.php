<?php

namespace OlzaApiClient\Entities\Response;

/**
 * Generic single Parcel output entity
 */
class SpecificData
        implements ApiResponseAwareInterface
{

    /**
     * 
     * @var string
     */
    protected $marketPlaceId;
    
    /**
     * 
     * @var bool
     */
    protected $pickupOrdered = FALSE;

    /**
     * 
     * @return string
     */
    public function getMarketPlaceId() {
        return $this->marketPlaceId;
    }

    /**
     * 
     * @return bool
     */
    public function isPickupOrdered() {
        return $this->pickupOrdered;
    }

    /**
     * 
     * @param string $marketPlaceId
     * @return $this
     */
    public function setMarketPlaceId($marketPlaceId) {
        $this->marketPlaceId = $marketPlaceId;
        return $this;
    }

    /**
     * 
     * @return $this
     */
    public function setPickupOrdered() {
        $this->pickupOrdered = TRUE;
        return $this;
    }

    /**
     * 
     * @return $this
     */
    public function setPickupNotOrdered() {
        $this->pickupOrdered = FALSE;
        return $this;
    }    

        
    /**
     * Load data to output
     * @param array $data
     * @return SpecificData
     */
    public static function fromApiData($data) {
        
        $entity = new self();
        
        if( !empty($data['marketPlaceId']) ) {
            $entity->setMarketPlaceId($data['marketPlaceId']);
        }
        
        if( !empty($data['pick']) ) {
            $entity->setPickupOrdered();
        }
              
        return $entity;
        
    }


}
