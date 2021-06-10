<?php

namespace OlzaApiClient\Entities\Response;

use DateTime;

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
     * @var string 
     */
    protected $speditionExternalTrackingUrl = '';
    
    /**
     * 
     * @var DateTime|null
     */
    protected $deliveryDate = NULL;
    
    /**
     * 
     * @var ParcelStatusLogList
     */
    protected $parcelStatusHistory;
    
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
     * 
     * @return string
     */
    public function getSpeditionExternalTrackingUrl() {
        return $this->speditionExternalTrackingUrl;
    }

    /**
     * 
     * @param string $speditionExternalTrackingUrl
     * @return $this
     */
    public function setSpeditionExternalTrackingUrl($speditionExternalTrackingUrl) {
        $this->speditionExternalTrackingUrl = $speditionExternalTrackingUrl;
        return $this;
    }
    
    /**
     * 
     * @return DateTime|null
     */
    public function getDeliveryDate() {
        return $this->deliveryDate;
    }

    /**
     * 
     * @param DateTime $deliveryDate
     * @return $this
     */
    public function setDeliveryDate(DateTime $deliveryDate) {
        $this->deliveryDate = $deliveryDate;
        return $this;
    }

    /**
     * 
     * @return bool
     */
    public function hasDeliveryDate() {
        return $this->getDeliveryDate() instanceof DateTime;
    }
    
    /**
     * 
     * @return ParcelStatusLogList
     */
    public function getParcelStatusHistory() {
        return $this->parcelStatusHistory;
    }

    /**
     * 
     * @param ParcelStatusLogList $parcelStatusHistory
     * @return $this
     */
    public function setParcelStatusHistory(ParcelStatusLogList $parcelStatusHistory) {
        $this->parcelStatusHistory = $parcelStatusHistory;
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
        
        if( !empty($data['speditionExternalTrackingUrl']) ) {
            $parcel->setSpeditionExternalTrackingUrl( $data['speditionExternalTrackingUrl'] );
        }  
        
        if( !empty($data['deliveryDate']) ) {
            $parcel->setDeliveryDate( DateTime::createFromFormat('Y-m-d H:i:s', $data['deliveryDate'] ) );
        }
        
        if( !empty($data['packageStatusHistory']) ) {
            $parcel->setParcelStatusHistory( ParcelStatusLogList::fromApiData( $data['packageStatusHistory'] ) );
        } 
        
        return $parcel;
        
    }


}
