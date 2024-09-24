<?php

use OlzaApiClient\Entities\Helpers\PostShipmentsEnity;
use PHPUnit\Framework\TestCase;

final class PostShipmentsEnityTest extends TestCase
{
    public function testDefaultValues(): void
    {
        $instance = new PostShipmentsEnity();
        
        $this->assertSame([], $instance->getShipmentList());
    }
    
    public function testSetListFromArray(): void
    {
        $instance = new PostShipmentsEnity();
        $instance->setListFromArray([123, 456]);
        $this->assertSame([123, 456], $instance->getShipmentList());
    }
    
    public function testAddToListFromArray(): void
    {
        $instance = new PostShipmentsEnity();
        $instance->setListFromArray([123, 456]);
        $instance->addToListFromArray([777, 888]);
        $this->assertSame([123, 456, 777, 888], $instance->getShipmentList());
    }
    
    public function testAddShipmentId(): void
    {
        $instance = new PostShipmentsEnity();
        $instance->addShipmentId(123);
        $this->assertSame([123], $instance->getShipmentList());
        $instance->addShipmentId(456);
        $this->assertSame([123, 456], $instance->getShipmentList());
    }
    
    public function testRemoveshipmentId(): void
    {
        $instance = new PostShipmentsEnity();
        $instance->addShipmentId(123);
        $instance->addShipmentId(456);
        
        $instance->removeshipmentId(456);
        $this->assertSame([123], $instance->getShipmentList());
        
        $instance->removeshipmentId(123);
        $this->assertSame([], $instance->getShipmentList());
    }
    
    public function testGetApiRequestStructure(): void
    {
        $instance = new PostShipmentsEnity();
        $instance->addShipmentId(123);
        $instance->addShipmentId(456);
        
        $this->assertSame([
            'shipmentList' => [123, 456],
        ], $instance->getApiRequestStructure());
    }
}
