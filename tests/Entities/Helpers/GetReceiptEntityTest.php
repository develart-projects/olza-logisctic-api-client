<?php

use OlzaApiClient\Entities\Helpers\GetReceiptEntity;
use PHPUnit\Framework\TestCase;

final class GetReceiptEntityTest extends TestCase
{
    public function testDefaultValues(): void
    {
        $instance = new GetReceiptEntity();
        
        $this->assertSame([], $instance->getShipmentList());
    }
    
    public function testGetApiRequestStructure(): void
    {
        $instance = new GetReceiptEntity();
        $instance->addShipmentId(123);
        $instance->addShipmentId(456);
        
        $this->assertSame([
            'shipmentList' => [123, 456],
        ], $instance->getApiRequestStructure());
    }
}
