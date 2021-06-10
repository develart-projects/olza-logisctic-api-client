<?php

namespace OlzaApiClient\Entities\Helpers;

/**
 * API get statuses data entity
 */
class GetStatusesEntity extends AbstractShipmentList
{
    /**
     * 
     * @var bool
     */
    protected $showHistory = false;
    
            
    /**
     * Convert object to formated array
     * @return array
     */
    public function getApiRequestStructure() {
        
        $out = Array();
        
        $out['shipmentList'] = $this->getShipmentList();
        $out['showHistory'] = $this->isShowHistoryActive();
        
        return $this->arrayFilterRecursive($out);
    }
    
    /**
     * Show status history
     * @return $this
     */
    public function setShowHistory() {
        $this->showHistory = true;
        return $this;
    }
    
    /**
     * Hide status history
     * @return $this
     */
    public function unsetShowHistory() {
        $this->showHistory = false;
        return $this;
    }

    /**
     * 
     * @return bool
     */
    public function isShowHistoryActive() {
        return $this->showHistory;
    }



}