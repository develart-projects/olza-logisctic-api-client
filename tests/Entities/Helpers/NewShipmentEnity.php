<?php

use OlzaApiClient\Entities\Helpers\NewShipmentEnity;
use PHPUnit\Framework\TestCase;

final class NewShipmentEnityTest extends TestCase
{
    public function testDefaultValues(): void
    {
        $instance = new NewShipmentEnity();
        
        $this->assertSame(null, $instance->getApiCustomRef());
        $this->assertSame(null, $instance->getSenderCountry());
        $this->assertSame(null, $instance->getRecipientCountry());
        $this->assertSame(null, $instance->getSpeditionCode());
        $this->assertSame(null, $instance->getShipmentType());
        $this->assertSame(null, $instance->getSenderId());
        $this->assertSame(null, $instance->getSenderName());
        $this->assertSame(null, $instance->getSenderAddress());
        $this->assertSame(null, $instance->getSenderCity());
        $this->assertSame(null, $instance->getSenderZipcode());
        $this->assertSame(null, $instance->getSenderContactPerson());
        $this->assertSame(null, $instance->getSenderEmail());
        $this->assertSame(null, $instance->getSenderPhone());
        $this->assertSame(null, $instance->getRecipientFirstname());
        $this->assertSame(null, $instance->getRecipientSurname());
        $this->assertSame(null, $instance->getRecipientAddress());
        $this->assertSame(null, $instance->getRecipientCity());
        $this->assertSame(null, $instance->getRecipientZipcode());
        $this->assertSame(null, $instance->getRecipientContactPerson());
        $this->assertSame(null, $instance->getRecipientEmail());
        $this->assertSame(null, $instance->getRecipientPhone());
        $this->assertSame(null, $instance->getPickupPlaceId());
        $this->assertSame(null, $instance->getDispatchPlaceId());
        $this->assertSame([], $instance->getServices());
        $this->assertSame(null, $instance->getCodAmount());
        $this->assertSame(null, $instance->getCodReference());
        $this->assertSame(1, $instance->getPackageCount());
        $this->assertSame(null, $instance->getWeight());
        $this->assertSame(null, $instance->getShipmentDescription());
        $this->assertSame(false, $instance->getPick());
        $this->assertSame(null, $instance->getShipmentPickupDate());
        $this->assertSame(null, $instance->getMarketPlaceId());
        $this->assertSame(null, $instance->getSenderCounty());
        $this->assertSame(null, $instance->getRecipientCounty());
        $this->assertSame(false, $instance->getRecipientWarehouseFlag());
        $this->assertSame([
            'params' => [],
            'items' => [],
        ], $instance->getCustoms());
        
    }
    
    public function testSettersAndGetters(): void
    {
        $instance = new NewShipmentEnity();
        
        $instance->setApiCustomRef('123');
        $this->assertSame('123', $instance->getApiCustomRef());
        
        $instance->setSenderCountry('CZ');
        $this->assertSame('CZ', $instance->getSenderCountry());
        
        $instance->setRecipientCountry('SK');
        $this->assertSame('SK', $instance->getRecipientCountry());
        
        $instance->setSpeditionCode('555');
        $this->assertSame('555', $instance->getSpeditionCode());
        
        $instance->setShipmentType('type');
        $this->assertSame('type', $instance->getShipmentType());
        
        $instance->setSenderId('444');
        $this->assertSame('444', $instance->getSenderId());
        
        $instance->setSenderName('Sender name');
        $this->assertSame('Sender name', $instance->getSenderName());
        
        $instance->setSenderAddress('Sender address');
        $this->assertSame('Sender address', $instance->getSenderAddress());
        
        $instance->setSenderCity('Sender city');
        $this->assertSame('Sender city', $instance->getSenderCity());
        
        $instance->setSenderZipcode('01001');
        $this->assertSame('01001', $instance->getSenderZipcode());
        
        $instance->setSenderContactPerson('Sender contact person');
        $this->assertSame('Sender contact person', $instance->getSenderContactPerson());
        
        $instance->setSenderEmail('sender@email.com');
        $this->assertSame('sender@email.com', $instance->getSenderEmail());
        
        $instance->setSenderPhone('+421901000000');
        $this->assertSame('+421901000000', $instance->getSenderPhone());
        
        $instance->setRecipientFirstname('Recfirstname');
        $this->assertSame('Recfirstname', $instance->getRecipientFirstname());
        
        $instance->setRecipientSurname('Recsurname');
        $this->assertSame('Recsurname', $instance->getRecipientSurname());
        
        $instance->setRecipientAddress('Recipient address');
        $this->assertSame('Recipient address', $instance->getRecipientAddress());
        
        $instance->setRecipientCity('Recipient city');
        $this->assertSame('Recipient city', $instance->getRecipientCity());
        
        $instance->setRecipientZipcode('09001');
        $this->assertSame('09001', $instance->getRecipientZipcode());
        
        $instance->setRecipientContactPerson('Recipient contact person');
        $this->assertSame('Recipient contact person', $instance->getRecipientContactPerson());
        
        $instance->setRecipientEmail('recipient@email.com');
        $this->assertSame('recipient@email.com', $instance->getRecipientEmail());
        
        $instance->setRecipientPhone('+4201111111111');
        $this->assertSame('+4201111111111', $instance->getRecipientPhone());
        
        $instance->setPickupPlaceId('999');
        $this->assertSame('999', $instance->getPickupPlaceId());
        
        $instance->setDispatchPlaceId('777');
        $this->assertSame('777', $instance->getDispatchPlaceId());
        
        $instance->setPackageCount(2);
        $this->assertSame(2, $instance->getPackageCount());
        
        $instance->setWeight(2.4);
        $this->assertSame(2.4, $instance->getWeight());
        
        $instance->setShipmentDescription('Shipment desc');
        $this->assertSame('Shipment desc', $instance->getShipmentDescription());
        
        $instance->setPick(true);
        $this->assertSame(true, $instance->getPick());
        
        $instance->setShipmentPickupDate('2024-10-01');
        $this->assertSame('2024-10-01', $instance->getShipmentPickupDate());
        
        $instance->setMarketPlaceId('888');
        $this->assertSame('888', $instance->getMarketPlaceId());
        
        $instance->setSenderCounty('sender_county');
        $this->assertSame('sender_county', $instance->getSenderCounty());
        
        $instance->setRecipientCounty('recipient_county');
        $this->assertSame('recipient_county', $instance->getRecipientCounty());
        
        $instance->setRecipientWarehouseFlag(true);
        $this->assertSame(true, $instance->getRecipientWarehouseFlag());
        
        $instance->setCustoms([
            'params' => [['key' => 'value']],
            'items' => [['keyitem' => 'valueitem']],
        ]);
        $this->assertSame([
            'params' => [['key' => 'value']],
            'items' => [['keyitem' => 'valueitem']],
        ], $instance->getCustoms());
    }
    
    public function testAddService(): void
    {
        $instance = new NewShipmentEnity();
        $instance->addService('key1', 'value1');
        $instance->addService('key2', 'value2');
        $this->assertSame(['key1' => 'value1', 'key2' => 'value2'], $instance->getServices());
    }
    
    public function testRemoveService(): void
    {
        $instance = new NewShipmentEnity();
        $instance->addService('key1', 'value1');
        $instance->addService('key2', 'value2');
        $instance->removeService('key1');
        $this->assertSame(['key2' => 'value2'], $instance->getServices());
    }
    
    public function testUpdateService(): void
    {
        $instance = new NewShipmentEnity();
        $instance->addService('key1', 'value1');
        $instance->updateService('key1', 'value2');
        $this->assertSame(['key1' => 'value2'], $instance->getServices());
    }
    
    public function testSetCustomsParams(): void
    {
        $instance = new NewShipmentEnity();
        $instance->setCustomsParams(['key' => 'value']);
        $instance->setCustomsParams(['key2' => 'value2']);
        $this->assertSame([
            'params' => [
                ['key' => 'value'],
                ['key2' => 'value2'],
            ],
            'items' => [],
        ], $instance->getCustoms());
    }
    
    public function testSetCustomsItems(): void
    {
        $instance = new NewShipmentEnity();
        $instance->setCustomsItems(['key' => 'value']);
        $instance->setCustomsItems(['key2' => 'value2']);
        $this->assertSame([
            'params' => [],
            'items' => [
                ['key' => 'value'],
                ['key2' => 'value2'],
        ]], $instance->getCustoms());
    }
    
    public function testAddParamToCustoms(): void
    {
        $instance = new NewShipmentEnity();
        $instance->addParamToCustoms('key', 'value');
        $instance->addParamToCustoms('key2', 'value2');
        $this->assertSame([
            'params' => [
                ['key' => 'value'],
                ['key2' => 'value2'],
            ],
            'items' => [],
        ], $instance->getCustoms());
    }
    
    public function testAddItemToCustoms(): void
    {
        $instance = new NewShipmentEnity();
        $instance->addItemToCustoms(['key' => 'value']);
        $instance->addItemToCustoms(['key2' => 'value2']);
        $this->assertSame([
            'params' => [],
            'items' => [
                ['key' => 'value'],
                ['key2' => 'value2'],
        ]], $instance->getCustoms());
    }   
        
    public function testGetApiRequestStructure(): void
    {
        $instance = new NewShipmentEnity();
        $instance->setApiCustomRef('123');
        $instance->setSenderCountry('CZ');
        $instance->setRecipientCountry('SK');
        $instance->setSpeditionCode('SPEDITION_CODE');
        $instance->setShipmentType('SHIPMENT_TYPE');
        $instance->setSenderId(111);
        $instance->setSenderName('Sender Name');
        $instance->setSenderAddress('Sender Address');
        $instance->setSenderCity('Sender City');
        $instance->setSenderZipcode('01001');
        $instance->setSenderContactPerson('Sender Contact Person');
        $instance->setSenderEmail('sender@email.com');
        $instance->setSenderPhone('+420123456789');
        $instance->setSenderCounty('Sender County');
        $instance->setDispatchPlaceId('DISPATCH_PLACE_ID');
        $instance->setRecipientWarehouseFlag(true);
        $instance->setRecipientFirstname('Recipient Firstname');
        $instance->setRecipientSurname('Recipient Surname');
        $instance->setRecipientAddress('Recipient Address');
        $instance->setRecipientCity('Recipient City');
        $instance->setRecipientZipcode('09009');
        $instance->setRecipientContactPerson('Recipient Contact Person');
        $instance->setRecipientEmail('recipient@email.com');
        $instance->setRecipientPhone('+421987654321');
        $instance->setRecipientCounty('Recipient County');
        $instance->setPickupPlaceId('PICKUP_PLACE_ID');
        $instance->setServices(['service_key' => 'service_value']);
        $instance->setCodAmount(123.45);
        $instance->setCodReference('COD_REFERENCE');
        $instance->setPackageCount(2);
        $instance->setWeight(10.5);
        $instance->setShipmentDescription('Shipment Description');
        $instance->setPick(true);
        $instance->setShipmentPickupDate('2025-01-01');
        $instance->setMarketPlaceId('MARKET_PLACE_ID');
        $instance->setCustoms([
            'params' => [
                ['param_key_1' => 'param_value_1'],
                ['param_key_2' => 'param_value_2'],
            ],
            'items' => [
                ['item_key_1' => 'item_value_1'],
                ['item_key_2' => 'item_value_2'],
            ],
        ]);
        
        $this->assertSame([
            'apiCustomRef' => '123',
            'preset' => [
                'senderCountry' => 'CZ',
                'recipientCountry' => 'SK',
                'speditionCode' => 'SPEDITION_CODE',
                'shipmentType' => 'SHIPMENT_TYPE',
                'senderId' => 111,
            ],
            'sender' => [
                'senderName' => 'Sender Name',
                'senderAddress' => 'Sender Address',
                'senderCity' => 'Sender City',
                'senderZipcode' => '01001',
                'senderContactPerson' => 'Sender Contact Person',
                'senderEmail' => 'sender@email.com',
                'senderPhone' => '+420123456789',
                'senderCounty' => 'Sender County',
                'dispatchPlaceId' => 'DISPATCH_PLACE_ID',
            ],
            'recipient' => [
                'recipientWarehouseFlag' => true,
                'recipientFirstname' => 'Recipient Firstname',
                'recipientSurname' => 'Recipient Surname',
                'recipientAddress' => 'Recipient Address',
                'recipientCity' => 'Recipient City',
                'recipientZipcode' => '09009',
                'recipientContactPerson' => 'Recipient Contact Person',
                'recipientEmail' => 'recipient@email.com',
                'recipientPhone' => '+421987654321',
                'recipientCounty' => 'Recipient County',
                'pickupPlaceId' => 'PICKUP_PLACE_ID',
            ],
            'services' => ['service_key' => 'service_value'],
            'cod' => [
                'codAmount' => 123.45,
                'codReference' => 'COD_REFERENCE',
            ],
            'packages' => [
                'packageCount' => 2,
                'weight' => 10.5,
                'shipmentDescription' => 'Shipment Description',
            ],
            'specific' => [
                'pick' => true,
                'shipmentPickupDate' => '2025-01-01',
                'marketPlaceId' => 'MARKET_PLACE_ID',
            ],
            'customs' => [
                'params' => [
                    ['param_key_1' => 'param_value_1'],
                    ['param_key_2' => 'param_value_2'],
                ],
                'items' => [
                    ['item_key_1' => 'item_value_1'],
                    ['item_key_2' => 'item_value_2'],
                ],
            ],
        ], $instance->getApiRequestStructure());
    }
}
