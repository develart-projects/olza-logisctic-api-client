<?php

namespace OlzaApiClient\Entities\Helpers;

/**
 * API header data entity
 */
class HeaderEntity extends AbstractHelper    
{
    
    const LANG_CS = 'cs';
    const LANG_PL = 'pl';
    
    /**
     *
     * @var string 
     */
    protected $apiUser;
    
    /**
     *
     * @var string 
     */
    protected $apiPassword;
    
    /**
     *
     * @var string 
     */
    protected $language;
    
    /**
     * HeaderStructure object with default language CS preset.
     */
    function __construct() {
        $this->language = self::LANG_CS;
    }
    
    /**
     * 
     * @return string
     */
    public function getApiUser() {
        return $this->apiUser;
    }

    /**
     * 
     * @return string
     */
    public function getApiPassword() {
        return $this->apiPassword;
    }

    /**
     * 
     * @return string
     */
    public function getLanguage() {
        return $this->language;
    }

    /**
     * 
     * @param string $apiUser
     * @return HeaderEntity
     */
    public function setApiUser($apiUser) {
        $this->apiUser = $apiUser;
        return $this;
    }

    /**
     * 
     * @param string $apiPassword
     * @return HeaderEntity
     */
    public function setApiPassword($apiPassword) {
        $this->apiPassword = $apiPassword;
        return $this;
    }

    /**
     * 
     * @param string $language
     * @return HeaderEntity
     */
    public function setLanguage($language) {
        $this->language = $language;
        return $this;
    }
            
    /**
     * Convert object to formated array
     * @return array
     */
    public function getApiRequestStructure() {
        
        $out = Array();
        
        $out['apiUser'] = $this->getApiUser();
        $out['apiPassword'] = $this->getApiPassword();
        $out['language'] = $this->getLanguage();

        return $this->arrayFilterRecursive($out);
    }
}