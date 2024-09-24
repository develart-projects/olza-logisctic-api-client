<?php

use OlzaApiClient\Entities\Response\Sender;
use PHPUnit\Framework\TestCase;

final class SenderTest extends TestCase
{
    public function testDefaultValues(): void
    {
        $instance = new Sender();
        
        $this->assertSame('', $instance->getSenderId());
        $this->assertSame('', $instance->getSenderName());
        $this->assertSame('', $instance->getSenderAddress());
        $this->assertSame('', $instance->getSenderCity());
        $this->assertSame('', $instance->getSenderZipcode());
        $this->assertSame(null, $instance->getSenderCounty());
        $this->assertSame('', $instance->getSenderContactPerson());
        $this->assertSame('', $instance->getSenderPhone());
        $this->assertSame('', $instance->getSenderEmail());
        $this->assertSame('', $instance->getDispatchPlaceId());
    }
    
    public function testSettersAndGetters(): void
    {
        $instance = new Sender();
        
        $instance->setSenderId('123');
        $this->assertSame('123', $instance->getSenderId());
        
        $instance->setSenderName('Jozef Liska');
        $this->assertSame('Jozef Liska', $instance->getSenderName());
        
        $instance->setSenderAddress('Address');
        $this->assertSame('Address', $instance->getSenderAddress());
        
        $instance->setSenderCity('City');
        $this->assertSame('City', $instance->getSenderCity());
        
        $instance->setSenderZipcode('12345');
        $this->assertSame('12345', $instance->getSenderZipcode());
        
        $instance->setSenderCounty('County');
        $this->assertSame('County', $instance->getSenderCounty());
        
        $instance->setSenderContactPerson('Contact Person');
        $this->assertSame('Contact Person', $instance->getSenderContactPerson());
        
        $instance->setSenderPhone('123456789');
        $this->assertSame('123456789', $instance->getSenderPhone());
        
        $instance->setSenderEmail('jozef.liska@develart.cz');
        $this->assertSame('jozef.liska@develart.cz', $instance->getSenderEmail());
        
        $instance->setDispatchPlaceId('456');
        $this->assertSame('456', $instance->getDispatchPlaceId());
    }
    
    public function testLoadFromApiData(): void
    {
        $instance = Sender::fromApiData([
            'senderName' => 'Jozef Liska',
            'senderAddress' => 'Address',
            'senderCity' => 'City',
            'senderZipcode' => '12345',
            'senderCounty' => 'County',
            'senderContactPerson' => 'Contact Person',
            'senderPhone' => '123456789',
            'senderEmail' => 'jozef.liska@develart.cz',
            'dispatchPlaceId' => '456',
        ]);
        
        $this->assertSame('Jozef Liska', $instance->getSenderName());
        $this->assertSame('Address', $instance->getSenderAddress());
        $this->assertSame('City', $instance->getSenderCity());
        $this->assertSame('12345', $instance->getSenderZipcode());
        $this->assertSame('County', $instance->getSenderCounty());
        $this->assertSame('Contact Person', $instance->getSenderContactPerson());
        $this->assertSame('123456789', $instance->getSenderPhone());
        $this->assertSame('jozef.liska@develart.cz', $instance->getSenderEmail());
        $this->assertSame('456', $instance->getDispatchPlaceId());
    }
}
