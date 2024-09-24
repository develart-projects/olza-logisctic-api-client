<?php

use OlzaApiClient\Entities\Helpers\GetShipmentsDetailsEntity;
use PHPUnit\Framework\TestCase;

final class GetShipmentsDetailsEntityTest extends TestCase
{
    public function testDefaultValues(): void
    {
        $instance = new GetShipmentsDetailsEntity();
        
        $this->assertSame([], $instance->getShipmentListFiltering());
        $this->assertSame([], $instance->getSpeditionListFiltering());
    }
    
    public function testGetApiRequestStructure(): void
    {
        $instance = new GetShipmentsDetailsEntity();
        $instance->setShipmentListFilterFromArray([123, 456]);
        $instance->setSpeditionListFilterFromArray([111, 222]);
        
        $this->assertSame([
            'filters' => [
                'shipmentList' => [123, 456],
                'speditionCodes' => [111, 222],
            ]
        ], $instance->getApiRequestStructure());
    }
}
