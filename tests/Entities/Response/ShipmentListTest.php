<?php

use OlzaApiClient\Entities\Response\ShipmentList;
use OlzaApiClient\Entities\Response\Shipment;
use PHPUnit\Framework\TestCase;

class ShipmentListTest extends TestCase
{
    public function testAddShipment(): void
    {
        $shipment = new Shipment();
        $shipment->setApiCustomRef('123');
        
        $shipmentList = new ShipmentList();
        $shipmentList->addShipment($shipment);
        
        $this->assertSame(1, $shipmentList->count());
        $this->assertSame($shipment, $shipmentList->getFirstShipment());
        $this->assertSame(['123' => $shipment], $shipmentList->toArray());
    }
    
    public function testAddShipmentMultiple(): void
    {
        $shipment1 = new Shipment();
        $shipment1->setApiCustomRef('123');
        
        $shipment2 = new Shipment();
        $shipment2->setApiCustomRef('456');
        
        $shipmentList = new ShipmentList();
        $shipmentList->addShipment($shipment1);
        $shipmentList->addShipment($shipment2);
        
        $this->assertSame(2, $shipmentList->count());
        $this->assertSame($shipment1, $shipmentList->getFirstShipment());
        $this->assertSame(['123' => $shipment1, '456' => $shipment2], $shipmentList->toArray());
    }
    
    public function testFromApiData(): void
    {
        $data = [
            [ 'apiCustomRef' => '123' ],
            [ 'apiCustomRef' => '456' ],
        ];
        
        $shipmentList = ShipmentList::fromApiData($data);
        
        $this->assertSame(2, $shipmentList->count());
        $this->assertSame('123', $shipmentList->getFirstShipment()->getApiCustomRef());
    }
}