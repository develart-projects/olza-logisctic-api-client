<?php

use OlzaApiClient\Entities\Helpers\GetStatusesEntity;
use PHPUnit\Framework\TestCase;

final class GetStatusesEntityTest extends TestCase
{
    public function testDefaultValues(): void
    {
        $instance = new GetStatusesEntity();
        
        $this->assertSame(false, $instance->isShowHistoryActive());
    }
    
    public function testSettersAndGetters(): void
    {
        $instance = new GetStatusesEntity();
        
        $instance->setShowHistory();
        $this->assertSame(true, $instance->isShowHistoryActive());
        
        $instance->unsetShowHistory();
        $this->assertSame(false, $instance->isShowHistoryActive());
    }
    
    public function testGetApiRequestStructure(): void
    {
        $instance = new GetStatusesEntity();
        $instance->addShipmentId(123);
        $instance->addShipmentId(456);
        $instance->setShowHistory();
        
        $this->assertSame([
            'shipmentList' => [123, 456],
            'showHistory' => true,
        ], $instance->getApiRequestStructure());
    }
}
