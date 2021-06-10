<?php

namespace OlzaApiClient\Entities\Response;

use DateTime;

/**
 * Generic single Parcel status log entity
 */
class ParcelStatusLog
        implements ApiResponseAwareInterface
{
   
   
    /**
     *
     * @var string
     */
    protected $parcelStatus = '';
    
    /**
     *
     * @var string 
     */
    protected $login = '';
    
    /**
     * 
     * @var DateTime 
     */
    protected $time;

    
    /**
     * 
     * Init
     */
    public function __construct() {
        
        $this->time = new DateTime;
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
    public function getLogin() {
        return $this->login;
    }

    /**
     * 
     * @return DateTime
     */
    public function getTime() {
        return $this->time;
    }

    /**
     * 
     * @param string $login
     * @return $this
     */
    public function setLogin($login) {
        $this->login = $login;
        return $this;
    }

    /**
     * 
     * @param DateTime $time
     * @return $this
     */
    public function setTime(DateTime $time) {
        $this->time = $time;
        return $this;
    }

        
    /**
     * Load data to output Parcel status log entity
     * @param array $data
     * @return ParcelStatusLog
     */
    public static function fromApiData($data) {
        
        $ent = new self();

        if( !empty($data['packageStatus']) ) {
            $ent->setParcelStatus( $data['packageStatus'] );
        }
        
        if( !empty($data['login']) ) {
            $ent->setLogin( $data['login'] );
        }  
        
        if( !empty($data['time']) ) {
            
            $dt = DateTime::createFromFormat('Y-m-d H:i:s', $data['time'] );
            if($dt instanceof DateTime) {
               $ent->setTime($dt); 
            }
            
        }
        
        return $ent;
        
    }


}
