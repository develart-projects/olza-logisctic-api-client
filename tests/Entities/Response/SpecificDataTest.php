<?php

use OlzaApiClient\Entities\Response\SpecificData;
use PHPUnit\Framework\TestCase;

final class SpecificDataTest extends TestCase
{
    public function testDefaultValues(): void
    {
        $instance = new SpecificData();
        
        $this->assertSame(null, $instance->getMarketPlaceId());
        $this->assertSame(false, $instance->isPickupOrdered());
    }
    
    public function testSettersAndGetters(): void
    {
        $instance = new SpecificData();
        
        $instance->setMarketPlaceId('123');
        $this->assertSame('123', $instance->getMarketPlaceId());
        
        $instance->setPickupOrdered();
        $this->assertSame(true, $instance->isPickupOrdered());
        
        $instance->setPickupNotOrdered();
        $this->assertSame(false, $instance->isPickupOrdered());
    }
    
    public function testLoadFromApiData(): void
    {
        $instance = SpecificData::fromApiData([
            'marketPlaceId' => '123',
            'pick' => true,
        ]);
        
        $this->assertSame('123', $instance->getMarketPlaceId());
        $this->assertSame(true, $instance->isPickupOrdered());
    }
}
