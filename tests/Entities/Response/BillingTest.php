<?php

use OlzaApiClient\Entities\Response\Billing;
use PHPUnit\Framework\TestCase;

final class BillingTest extends TestCase
{
    public function testDefaultValues(): void
    {
        $instance = new Billing();
        
        $this->assertSame(0, $instance->getNetPrice());
        $this->assertSame(0, $instance->getVatRate());
        $this->assertSame('', $instance->getCurrency());
    }
    
    public function testSettersAndGetters(): void
    {
        $instance = new Billing();
        
        $instance->setNetPrice(11.51);
        $this->assertSame(11.51, $instance->getNetPrice());
        
        $instance->setVatRate(12);
        $this->assertSame(12, $instance->getVatRate());
        
        $instance->setCurrency('CZK');
        $this->assertSame('CZK', $instance->getCurrency());
    }
    
    public function testLoadFromApiData(): void
    {
        $instance = Billing::fromApiData([
            'netPrice' => 11.51,
            'vatRate' => 12,
            'currency' => 'CZK',
        ]);
        
        $this->assertSame(11.51, $instance->getNetPrice());
        $this->assertSame(12, $instance->getVatRate());
        $this->assertSame('CZK', $instance->getCurrency());
    }
}
