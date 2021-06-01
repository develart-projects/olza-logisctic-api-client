<?php

namespace OlzaApiClient\Entities\Helpers;

/**
 * API load details about shipments
 */
class GetShipmentsDetailsEntity extends AbstractHelper
{

    /**
     *
     * @var array 
     */
    protected $shipmentListFilter = Array();
    
    /**
     *
     * @var array 
     */
    protected $speditionListFilter = Array();
    
    
    /**
     * Convert object to formated array
     * @return array
     */
    public function getApiRequestStructure()
    {

        $out = array();
        $filters = array();

        $filters['shipmentList'] = $this->getShipmentListFiltering();
        $filters['speditionCodes'] = $this->getSpeditionListFiltering();

        $out['filters'] = $filters;
 
        return $this->arrayFilterRecursive($out);
    }
    
    /**
     * 
     * @return array
     */
    public function getShipmentListFiltering() {
        return $this->shipmentListFilter;
    }

    /**
     * 
     * @return array
     */
    public function getSpeditionListFiltering() {
        return $this->speditionListFilter;
    }

    /**
     * Set list of shipments filtering directly as array vector
     * @param array $idVector
     * @return $this
     */
    public function setShipmentListFilterFromArray(array $idVector) {
        $this->shipmentListFilter = $idVector;
        return $this;
    }

    /**
     * Set list of speditions filtering directly as array vector
     * @param array $speditionCodesVector
     * @return $this
     */
    public function setSpeditionListFilterFromArray(array $speditionCodesVector) {
        $this->speditionListFilter = $speditionCodesVector;
        return $this;
    }


}
