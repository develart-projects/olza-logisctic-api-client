<?php

namespace OlzaApiClient\Entities\Request;

use OlzaApiClient\Entities\Helpers\HeaderEntity;
use OlzaApiClient\Entities\Helpers\AbstractShipmentList;
use OlzaApiClient\Interfaces\ApiImportInterface;
use OlzaApiClient\Exception\ApiClientException;

/**
 * Generic API batch request
 */
class ApiBatchRequest {
    
    /**
     * Body for API request
     * @var array 
     */
    protected $body = Array();

    
    /**
     * Get formated body array
     * @return array
     */
    public function getBody() {
        return $this->body;
    }
    
    /**
     * Set whole body of the request manually - must be formated according to manual
     * @param array $body
     * @return ApiBatchRequest
     */
    public function setBody(array $body) {
        $this->body = $body;
        return $this;
    }
    
    /**
     * Set header from helper
     * @param HeaderEntity $header
     * @return ApiBatchRequest
     */
    public function setHeaderFromHelper(HeaderEntity $header) {
        $this->body['header'] = $header->getApiRequestStructure();
        return $this;
    }
    
    /**
     * Set paylod from list helper
     * @param AbstractShipmentList $shipmentList
     * @return ApiBatchRequest
     */
    public function setPayloadFromHelper(AbstractShipmentList $shipmentList) {
        $this->body['payload'] = $shipmentList->getApiRequestStructure();
        return $this;
    }
    
    /**
     * Add single entity to payload from helper
     * @param ApiImportInterface $entity
     * @return ApiBatchRequest
     * @throws ApiClientException
     */
    public function addToPayloadFromHelper(ApiImportInterface $entity) {
        
        if($entity instanceof AbstractShipmentList) {
            throw new ApiClientException('Unsupported entity to add, use setPayloadFromHelper() instead.');
        }
        
        $this->body['payload'][] = $entity->getApiRequestStructure();
        
        return $this;
    }
    
    /**
     * Set header from array - must be manually formated as reuqested
     * @param array $header
     * @return ApiBatchRequest
     */
    public function setHeaderFromArray(array $header) {
        $this->body['header'] = $header;
        return $this;
    }
    
    /**
     * Set paylod from array - must be manually formated as reuqested
     * @param array $payload
     * @return ApiBatchRequest
     */
    public function setPayloadFromArray(array $payload) {
        $this->body['payload'] = $payload;
        return $this;
    }
    
    /**
     * Add single item to payload from array - must be manually formated as reuqested
     * @param array $item
     * @return ApiBatchRequest
     */
    public function addToPayloadFromArray(array $item) {
        $this->body['payload'][] = $item;
        return $this;
    } 

}