<?php

use OlzaApiClient\Entities\Response\Preset;
use PHPUnit\Framework\TestCase;

class PresetTest extends TestCase
{
    public function testDefaultValues()
    {
        $preset = new Preset();
        
        $this->assertNull($preset->getSenderCountry());
        $this->assertNull($preset->getRecipientCountry());
        $this->assertNull($preset->getSpeditionCode());
        $this->assertNull($preset->getShipmentType());
    }

    public function testSettersAndGetters()
    {
        $preset = new Preset();
        
        $preset->setSenderCountry('CZ');
        $this->assertEquals('CZ', $preset->getSenderCountry());
        
        $preset->setRecipientCountry('SK');
        $this->assertEquals('SK', $preset->getRecipientCountry());
        
        $preset->setSpeditionCode('SP123');
        $this->assertEquals('SP123', $preset->getSpeditionCode());
        
        $preset->setShipmentType('SHIPTYPE123');
        $this->assertEquals('SHIPTYPE123', $preset->getShipmentType());
    }

    public function testLoadFromApiData()
    {
        $data = [
            'senderCountry' => 'CZ',
            'recipientCountry' => 'SK',
            'speditionCode' => 'SP123',
            'shipmentType' => 'SHIPTYPE123',
        ];
        
        $preset = Preset::fromApiData($data);
        
        $this->assertEquals('CZ', $preset->getSenderCountry());
        $this->assertEquals('SK', $preset->getRecipientCountry());
        $this->assertEquals('SP123', $preset->getSpeditionCode());
        $this->assertEquals('SHIPTYPE123', $preset->getShipmentType());
    }
}