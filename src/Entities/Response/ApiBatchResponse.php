<?php

namespace OlzaApiClient\Entities\Response;

/**
 * Object is keeping all processed and failed responses
 */
class ApiBatchResponse {
    
    /**
     *
     * @var ProcessedList 
     */
    protected $processedList;
    
    /**
     *
     * @var ErrorList
     */
    protected $errorList;
    
    /**
     *
     * @var DataStream 
     */
    protected $dataStream;
    
    /**
     * 
     * @param ProcessedList $processedList
     * @param ErrorList $errorList
     * @param DataStream $dataStream = NULL
     */
    public function __construct(ProcessedList $processedList, ErrorList $errorList, DataStream $dataStream = NULL) {
        
        $this->processedList = $processedList;
        $this->errorList = $errorList;
        $this->dataStream = $dataStream;
     
        if( !$this->dataStream instanceof DataStream) {
            $this->setDataStream(new DataStream);
        } 
        
    }
    
    /**
     * Create batch response staticaly
     * @param ProcessedList $processedList
     * @param ErrorList $errorList
     * @param DataStream $dataStream = NULL
     * @return ApiBatchResponse
     */
    public static function create(ProcessedList $processedList, ErrorList $errorList, DataStream $dataStream = NULL)  {      
        return new self($processedList, $errorList, $dataStream);
    }

    
    /**
     * 
     * @return ProcessedList
     */
    public function getProcessedList() {
        return $this->processedList;
    }

    /**
     * 
     * @return ErrorList
     */
    public function getErrorList() {
        return $this->errorList;
    }

    /**
     * 
     * @param ProcessedList $processedList
     * @return ApiBatchResponse
     */
    public function setProcessedList(ProcessedList $processedList) {
        $this->processedList = $processedList;
        return $this;
    }

    /**
     * 
     * @param ErrorList $errorList
     * @return ApiBatchResponse
     */
    public function setErrorList(ErrorList $errorList) {
        $this->errorList = $errorList;
        return $this;
    }

    /**
     * 
     * @return DataStream
     */
    public function getDataStream() {
        return $this->dataStream;
    }

    /**
     * 
     * @param DataStream $dataStream
     * @return ApiBatchResponse
     */
    public function setDataStream(DataStream $dataStream) {
        $this->dataStream = $dataStream;
        return $this;
    }


    
}
