<?php

use OlzaApiClient\Entities\Response\Recipient;
use PHPUnit\Framework\TestCase;

final class RecipientTest extends TestCase
{
    public function testDefaultValues(): void
    {
        $instance = new Recipient();
        
        $this->assertSame('', $instance->getRecipientId());
        $this->assertSame('', $instance->getRecipientFirstname());
        $this->assertSame('', $instance->getRecipientSurname());
        $this->assertSame('', $instance->getRecipientAddress());
        $this->assertSame('', $instance->getRecipientCity());
        $this->assertSame('', $instance->getRecipientZipcode());
        $this->assertSame(null, $instance->getRecipientCounty());
        $this->assertSame('', $instance->getRecipientContactPerson());
        $this->assertSame('', $instance->getRecipientPhone());
        $this->assertSame('', $instance->getRecipientEmail());
        $this->assertSame('', $instance->getPickupPlaceId());
    }
    
    public function testSettersAndGetters(): void
    {
        $instance = new Recipient();
        
        $instance->setRecipientId('123');
        $this->assertSame('123', $instance->getRecipientId());
        
        $instance->setRecipientFirstname('Jozef');
        $this->assertSame('Jozef', $instance->getRecipientFirstname());
        
        $instance->setRecipientSurname('Liška');
        $this->assertSame('Liška', $instance->getRecipientSurname());
        
        $instance->setRecipientAddress('Address');
        $this->assertSame('Address', $instance->getRecipientAddress());
        
        $instance->setRecipientCity('City');
        $this->assertSame('City', $instance->getRecipientCity());
        
        $instance->setRecipientZipcode('12345');
        $this->assertSame('12345', $instance->getRecipientZipcode());
        
        $instance->setRecipientCounty('County');
        $this->assertSame('County', $instance->getRecipientCounty());
        
        $instance->setRecipientContactPerson('Contact Person');
        $this->assertSame('Contact Person', $instance->getRecipientContactPerson());
        
        $instance->setRecipientPhone('123456789');
        $this->assertSame('123456789', $instance->getRecipientPhone());
        
        $instance->setRecipientEmail('jozef.liska@develart.cz');
        $this->assertSame('jozef.liska@develart.cz', $instance->getRecipientEmail());
        
        $instance->setPickupPlaceId('467');
        $this->assertSame('467', $instance->getPickupPlaceId());
    }
    
    public function testLoadFromApiData(): void
    {
        $instance = Recipient::fromApiData([
            'recipientFirstname' => 'Jozef',
            'recipientSurname' => 'Liška',
            'recipientAddress' => 'Address',
            'recipientCity' => 'City',
            'recipientZipcode' => '12345',
            'recipientCounty' => 'County',
            'recipientContactPerson' => 'Contact Person',
            'recipientPhone' => '123456789',
            'recipientEmail' => 'jozef.liska@develart.cz',
            'pickupPlaceId' => '467',
        ]);
        
        $this->assertSame('Jozef', $instance->getRecipientFirstname());
        $this->assertSame('Liška', $instance->getRecipientSurname());
        $this->assertSame('Address', $instance->getRecipientAddress());
        $this->assertSame('City', $instance->getRecipientCity());
        $this->assertSame('12345', $instance->getRecipientZipcode());
        $this->assertSame('County', $instance->getRecipientCounty());
        $this->assertSame('Contact Person', $instance->getRecipientContactPerson());
        $this->assertSame('123456789', $instance->getRecipientPhone());
        $this->assertSame('jozef.liska@develart.cz', $instance->getRecipientEmail());
        $this->assertSame('467', $instance->getPickupPlaceId());
    }
    
    public function testHasRecipientEmail(): void
    {
        $instance = new Recipient();
        
        $this->assertFalse($instance->hasRecipientEmail());
        
        $instance->setRecipientEmail('jozef.liska@develart.cz');
        $this->assertTrue($instance->hasRecipientEmail());
    }
    
    public function testHasRecipientPhone(): void
    {
        $instance = new Recipient();
        
        $this->assertFalse($instance->hasRecipientPhone());
        
        $instance->setRecipientPhone('123456789');
        $this->assertTrue($instance->hasRecipientPhone());
    }
    
    public function testHasRecipientAddress(): void
    {
        $instance = new Recipient();
        
        $this->assertFalse($instance->hasRecipientAddress());
        
        $instance->setRecipientAddress('Address');
        $this->assertTrue($instance->hasRecipientAddress());
    }
    
    public function testHasRecipientCity(): void
    {
        $instance = new Recipient();
        
        $this->assertFalse($instance->hasRecipientCity());
        
        $instance->setRecipientCity('City');
        $this->assertTrue($instance->hasRecipientCity());
    }
    
    public function testHasRecipientZipcode(): void
    {
        $instance = new Recipient();
        
        $this->assertFalse($instance->hasRecipientZipcode());
        
        $instance->setRecipientZipcode('12345');
        $this->assertTrue($instance->hasRecipientZipcode());
    }
}
