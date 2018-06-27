<?php

namespace OlzaApiClient\Entities\Helpers;

/**
 * API get labels data entity
 */
class GetLabelsEnity extends AbstractShipmentList
{
    
    const LABELS_A4 = 'A4';
    const LABELS_A6 = 'A6';
    
    /**
     *
     * @var string
     */
    protected $pageFormat;
    
    /**
     * Prepare object with A4 size predefined
     */
    public function __construct() {
        $this->pageFormat = self::LABELS_A4;
    }
    
    /**
     * 
     * @return string
     */
    public function getPageFormat() {
        return $this->pageFormat;
    }

    /**
     * 
     * @param string $pageFormat
     * @return GetLabelsEnity
     */
    public function setPageFormat($pageFormat) {
        $this->pageFormat = $pageFormat;
        return $this;
    }

    
    /**
     * Convert object to formated array
     * @return array
     */
    public function getApiRequestStructure() {
        
        $out = Array();
        
        $out['shipmentList'] = $this->getShipmentList();
        $out['pageFormat'] = $this->getPageFormat();
        
        return $this->arrayFilterRecursive($out);
    }
}