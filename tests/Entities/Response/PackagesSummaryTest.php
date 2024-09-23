<?php

use OlzaApiClient\Entities\Response\PackagesSummary;
use PHPUnit\Framework\TestCase;

final class PackagesSummaryTest extends TestCase
{
    public function testDefaultValues(): void
    {
        $instance = new PackagesSummary();
        
        $this->assertSame(null, $instance->getPackageCount());
        $this->assertSame(0, $instance->getWeight());
        $this->assertSame(null, $instance->getShipmentDescription());
    }
    
    public function testSettersAndGetters(): void
    {
        $instance = new PackagesSummary();
        
        $instance->setPackageCount(3);
        $this->assertSame(3, $instance->getPackageCount());
        
        $instance->setWeight(11.51);
        $this->assertSame(11.51, $instance->getWeight());
        
        $instance->setShipmentDescription('test');
        $this->assertSame('test', $instance->getShipmentDescription());
    }
    
    public function testLoadFromApiData(): void
    {
        $instance = PackagesSummary::fromApiData([
            'packageCount' => 3,
            'weight' => 11.51,
            'shipmentDescription' => 'test',
        ]);
        
        $this->assertSame(3, $instance->getPackageCount());
        $this->assertSame(11.51, $instance->getWeight());
        $this->assertSame('test', $instance->getShipmentDescription());
    }
}
