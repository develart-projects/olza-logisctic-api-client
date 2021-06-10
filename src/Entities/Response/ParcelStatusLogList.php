<?php

namespace OlzaApiClient\Entities\Response;

/**
 * Container for status logs
 */
class ParcelStatusLogList
        implements ApiResponseAwareInterface
{
    
    /**
     *
     * @var array 
     */
    protected $logList = Array();
    
    /**
     * 
     * @param ParcelStatusLog $log
     */
    public function addLog(ParcelStatusLog $log) {
            $this->logList[] = $log;
    }
    
    /**
     * Load data to output logList entity
     * 
     * @param array $data
     * @return ParcelStatusLogList
     */
    public static function fromApiData($data) {
        
        $logList = new self();
        
        foreach($data as $logData) {
            $logList->addLog( ParcelStatusLog::fromApiData($logData) );
        }

        return $logList;
        
    }
    
    /**
     * Get array copy of list
     * @return array
     */
    public function toArray() {
        return $this->logList;
    }
    
    /**
     * Count rows
     * @return int
     */
    public function count() {
        return count($this->logList);
    }
    


}
