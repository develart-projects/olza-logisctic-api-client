<?php

namespace OlzaApiClient\Entities\Response;

/**
 * Container for services
 */
class ServiceList
        implements ApiResponseAwareInterface
{
    
    /**
     *
     * @var array 
     */
    protected $serviceList = Array();
    
    /**
     * Add single service to the actual list
     * @param Service $service
     */
    public function addService(Service $service) {
            $this->serviceList[$service->getCode()] = $service;
    }
    
    /**
     * Add another service list
     * @param ServiceList $services
     */
    public function addServices(ServiceList $services) {
            $this->serviceList += $services->toArray();
    }
    
    /**
     * Load data to output serviceList entity
     * 
     * @param array $data
     * @return ServiceList
     */
    public static function fromApiData($data) {
        
        $serviceList = new self();
        
        foreach($data as $serviceData) {
            $serviceList->addService( Service::fromApiData($serviceData) );
        }

        return $serviceList;
        
    }
    
    /**
     * Create serviceList of given type from services code vector
     * 
     * @param array $codeVector
     * @return serviceList
     */
    public static function fromCodeVector(array $codeVector) {
        
        $serviceList = new self();
        
        foreach($codeVector as $code) {
            $serviceList->addService( new Service($code) );
        }

        return $serviceList;        
    } 
    
    /**
     * Get first Service entity from the list
     * @return Service
     */
    public function getFirstService() {
        return reset($this->serviceList);
    }
    
    /**
     * Get array copy of list
     * @return array
     */
    public function toArray() {
        return $this->serviceList;
    }
    
    /**
     * Count rows
     * @return int
     */
    public function count() {
        return count($this->serviceList);
    }
    


}
