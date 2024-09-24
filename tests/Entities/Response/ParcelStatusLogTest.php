<?php

use OlzaApiClient\Entities\Response\ParcelStatusLog;
use PHPUnit\Framework\TestCase;

final class ParcelStatusLogTest extends TestCase
{
    public function testDefaultValues(): void
    {
        $instance = new ParcelStatusLog();
        
        $this->assertSame('', $instance->getParcelStatus());
        $this->assertSame('', $instance->getLogin());
        $this->assertInstanceOf(DateTime::class, $instance->getTime());
    }
    
    public function testSettersAndGetters(): void
    {
        $instance = new ParcelStatusLog();
        
        $instance->setParcelStatus('status_a');
        $this->assertSame('status_a', $instance->getParcelStatus());
        
        $instance->setLogin('login_a');
        $this->assertSame('login_a', $instance->getLogin());
        
        $instance->setTime(new DateTime('2020-01-01'));
        $this->assertInstanceOf(DateTime::class, $instance->getTime());
    }
    
    public function testLoadFromApiData(): void
    {
        $instance = ParcelStatusLog::fromApiData([
            'packageStatus' => 'status_a',
            'login' => 'login_a',
            'time' => '2020-01-01 00:00:00',
        ]);
        
        $this->assertSame('status_a', $instance->getParcelStatus());
        $this->assertSame('login_a', $instance->getLogin());
        $this->assertInstanceOf(DateTime::class, $instance->getTime());
    }
}
