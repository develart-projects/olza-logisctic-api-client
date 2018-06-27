<?php

namespace OlzaApiClient\Entities\Response;

/**
 * Generic single Parcel output entity
 */
class Parcel
        implements ApiResponseAwareInterface
{
    
    const PARCEL_TYPE_NORMAL = 'normal';
    const PARCEL_TYPE_EXCHANGE = 'exchange';
    
    /**
     *
     * @var string
     */
    protected $id = '';
    
    /**
     *
     * @var string 
     */
    protected $shipmentId = '';
    
    /**
     *
     * @var string
     */
    protected $parcelStatus = '';
    
    /**
     *
     * @var string 
     */
    protected $packageType = '';
    
    /**
     * 
     * @var string 
     */
    protected $speditionExternalId = '';

    /**
     *
     * @var string 
     */
    protected $speditionExternalBarcode = '';
    
    /**
     * 
     * @param string $id
     * @param string $packageType
     */
    public function __construct($id = '', $packageType = '') {
        
        $this->id = $id;
        $this->packageType = $packageType;
    }

    
    /**
     * 
     * @return string
     */
    public function getId() {
        return $this->id;
    }
    
    /**
     * 
     * @param string $id
     * @return Parcel
     */
    public function setId($id) {
        $this->id = $id;
        return $this;
    }
    
    /**
     * 
     * @return string
     */
    public function getShipmentId() {
        return $this->shipmentId;
    }

    /**
     * 
     * @param string $shipmentId
     * @return Parcel
     */
    public function setShipmentId($shipmentId) {
        $this->shipmentId = $shipmentId;
        return $this;
    }

    /**
     * 
     * @return string
     */
    public function getParcelStatus() {
        return $this->parcelStatus;
    }

    /**
     * 
     * @param string $status
     * @return Parcel
     */
    public function setParcelStatus($status) {
        $this->parcelStatus = $status;
        return $this;
    }
    
    /**
     * 
     * @return string
     */
    public function getPackageType() {
        return $this->packageType;
    }

    /**
     * 
     * @param string $packageType
     * @return $this
     */
    public function setPackageType($packageType) {
        $this->packageType = $packageType;
        return $this;
    }

    /**
     * 
     * @return string
     */
    public function getSpeditionExternalId() {
        return $this->speditionExternalId;
    }

    /**
     * 
     * @param string $speditionExternalId
     * @return Parcel
     */
    public function setSpeditionExternalId($speditionExternalId) {
        $this->speditionExternalId = $speditionExternalId;
        return $this;
    }
           
    /**
     * 
     * @return string
     */
    public function getSpeditionExternalBarcode() {
        return $this->speditionExternalBarcode;
    }

    /**
     * 
     * @param string $speditionExternalBarcode
     * @return Parcel
     */
    public function setSpeditionExternalBarcode($speditionExternalBarcode) {
        $this->speditionExternalBarcode = $speditionExternalBarcode;
        return $this;
    }


    
    /**
     * Load data to output Parcel entity
     * @param array $data
     * @return Parcel
     */
    public static function fromApiData($data) {
        
        $parcel = new self();
        
        if( !empty($data['shipmentId']) ) {
            $parcel->setShipmentId($data['shipmentId']);
        }
        
        if( !empty($data['packageId']) ) {
            $parcel->setId($data['packageId']);
        }
        
        if( !empty($data['packageType']) ) {
            $parcel->setPackageType($data['packageType']);
        }
        
        if( !empty($data['speditionExternalId']) ) {
            $parcel->setSpeditionExternalId($data['speditionExternalId']);
        }
        
        if( !empty($data['speditionExternalBarcode']) ) {
            $parcel->setSpeditionExternalBarcode($data['speditionExternalBarcode']);
        }

        if( !empty($data['packageStatus']) ) {
            $parcel->setParcelStatus( $data['packageStatus'] );
        }
        
        return $parcel;
        
    }


}
