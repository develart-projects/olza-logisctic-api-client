<?php

namespace OlzaApiClient\Entities\Response;

/**
 * Generic single Parcel output entity
 */
class PackagesSummary
        implements ApiResponseAwareInterface
{

    /**
     * 
     * @var int
     */
    protected $packageCount;
    
    /**
     * 
     * @var float
     */
    protected $weight = 0;

    /**
     * 
     * @var string
     */
    protected $shipmentDescription;
    
    /**
     * 
     * @return int
     */
    public function getPackageCount() {
        return $this->packageCount;
    }

    /**
     * 
     * @return float
     */
    public function getWeight() {
        return $this->weight;
    }

    /**
     * 
     * @return string
     */
    public function getShipmentDescription() {
        return $this->shipmentDescription;
    }

    /**
     * 
     * @param int $packageCount
     * @return $this
     */
    public function setPackageCount($packageCount) {
        $this->packageCount = $packageCount;
        return $this;
    }

    /**
     * 
     * @param float $weight
     * @return $this
     */
    public function setWeight($weight) {
        $this->weight = $weight;
        return $this;
    }

    /**
     * 
     * @param string $shipmentDescription
     * @return $this
     */
    public function setShipmentDescription($shipmentDescription) {
        $this->shipmentDescription = $shipmentDescription;
        return $this;
    }

    
        
    /**
     * Load data to output
     * @param array $data
     * @return PackagesSummary
     */
    public static function fromApiData($data) {
        
        $entity = new self();
        
        if( !empty($data['packageCount']) ) {
            $entity->setPackageCount( (int) $data['packageCount']);
        }
        
        if( !empty($data['weight']) ) {
            $entity->setWeight( (float) $data['weight']);
        }
        
        if( !empty($data['shipmentDescription']) ) {
            $entity->setShipmentDescription( $data['shipmentDescription']);
        }
              
        return $entity;
        
    }


}
