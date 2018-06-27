<?php

namespace OlzaApiClient\Entities\Response;

/**
 * Entity for encoded data stream
 */
class DataStream
        implements ApiResponseAwareInterface
{
    
    /**
     * base64_encoded data string
     * @var string
     */
    protected $data = '';
    
    /**
     * Init with data
     * @param string $data
     */
    public function __construct($data = '') {
        $this->data = $data;
    }
    
    /**
     *  base64_encoded data
     * @return string
     */
    public function getData() {
        return $this->data;
    }

    /**
     * 
     * @param string $data
     * @return DataStream
     */
    public function setData($data) {
        $this->data = $data;
        return $this;
    }

    /**
     * Plain data stream
     * @return string
     */
    public function getDataDecoded() {
        return base64_decode($this->data);
    }
    
    
    /**
     * Load data to output DataStream entity
     * @param array $data
     * @return DataStream
     */
    public static function fromApiData($data) {
        
        $dataStream = new self();

        if( !empty($data['data_stream']) ) {
            $dataStream->setData($data['data_stream']);
        }
        
        return $dataStream;
        
    }

}
