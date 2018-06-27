<?php

namespace OlzaApiClient\Entities\Response;

/**
 * Generic single Parcel output entity
 */
class ParcelList
        implements ApiResponseAwareInterface
{
    
    /**
     *
     * @var array 
     */
    protected $parcelList = Array();
    
    /**
     * Add single parcel to the actual list entity
     * @param Parcel $parcel
     */
    public function addParcel(Parcel $parcel) {
            $this->parcelList[$parcel->getId()] = $parcel;
    }
    
    /**
     * Add another parcel list
     * @param ParcelList $parcels
     */
    public function addParcels(ParcelList $parcels) {
            $this->parcelList += $parcels->toArray();
    }
    
    /**
     * Load data to output ParcelList entity
     * 
     * @param array $data
     * @return ParcelList
     */
    public static function fromApiData($data) {
        
        $parcelList = new self();
        
        foreach($data as $parcelData) {
            $parcelList->addParcel( Parcel::fromApiData($parcelData) );
        }

        return $parcelList;
        
    }
    
    /**
     * Create ParcelList of given type from parcel ID vector
     * 
     * @param array $idVector
     * @param string $packageType
     * @return ParcelList
     */
    public static function fromIdVector(array $idVector, $packageType) {
        
        $parcelList = new self();
        
        foreach($idVector as $parcelId) {
            $parcelList->addParcel( new Parcel($parcelId, $packageType) );
        }

        return $parcelList;        
    } 
    
    /**
     * Get first Parcel entity from the list
     * @return Parcel
     */
    public function getFirstParcel() {
        return reset($this->parcelList);
    }
    
    /**
     * Get array copy of list
     * @return array
     */
    public function toArray() {
        return $this->parcelList;
    }
    
    /**
     * Count rows
     * @return int
     */
    public function count() {
        return count($this->parcelList);
    }
    
    
    /**
     * Count parcels of given type
     * @return int
     */
    public function countParcelsByType($type) {
        
        $count = 0;
        
        foreach($this->parcelList as $parcel) {
            
            if($parcel->getPackageType() == $type) {
                $count++;
            }
        }
        
        return $count;
    }


}
