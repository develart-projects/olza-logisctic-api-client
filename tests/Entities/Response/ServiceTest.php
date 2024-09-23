<?php

use OlzaApiClient\Entities\Response\Service;
use PHPUnit\Framework\TestCase;

final class ServiceTest extends TestCase
{
    public function testDefaultValues(): void
    {
        $instance = new Service();
        
        $this->assertSame('', $instance->getCode());
        $this->assertSame('', $instance->getValue());
        $this->assertSame(0.0, $instance->getBillingPrice());
    }
    
    public function testContent(): void
    {
        $instance = new Service('123');
        $this->assertSame('123', $instance->getCode());
    }
    
    public function testSettersAndGetters(): void
    {
        $instance = new Service();
        
        $instance->setCode('123');
        $this->assertSame('123', $instance->getCode());
        
        $instance->setValue('ABC');
        $this->assertSame('ABC', $instance->getValue());
        
        $instance->setBillingPrice(12.34);
        $this->assertSame(12.34, $instance->getBillingPrice());
    }
    
    public function testLoadFromApiData(): void
    {
        $instance = Service::fromApiData([
            'code' => '123',
            'value' => 'ABC',
            'billingPrice' => 11.51,
        ]);
        
        $this->assertSame('123', $instance->getCode());
        $this->assertSame('ABC', $instance->getValue());
        $this->assertSame(11.51, $instance->getBillingPrice());
    }
}
