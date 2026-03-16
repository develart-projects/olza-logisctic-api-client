<?php

use OlzaApiClient\Entities\Helpers\GetLabelsEnity;
use PHPUnit\Framework\TestCase;

final class GetLabelsEnityTest extends TestCase
{
    public function testDefaultValues(): void
    {
        $instance = new GetLabelsEnity();
        
        $this->assertSame(GetLabelsEnity::LABELS_A4, $instance->getPageFormat());
    }
    
    public function testSettersAndGetters(): void
    {
        $instance = new GetLabelsEnity();
        
        $instance->setPageFormat(GetLabelsEnity::LABELS_A6);
        $this->assertSame(GetLabelsEnity::LABELS_A6, $instance->getPageFormat());
    }
    
    public function testGetApiRequestStructure(): void
    {
        $instance = new GetLabelsEnity();
        $instance->addShipmentId(123);
        $instance->addShipmentId(456);
        $instance->setPageFormat(GetLabelsEnity::LABELS_A6);
        
        $this->assertSame([
            'shipmentList' => [123, 456],
            'pageFormat' => GetLabelsEnity::LABELS_A6,
        ], $instance->getApiRequestStructure());
    }

    public function testAutoPopulate(): void
    {
        $instance = new GetLabelsEnity();
        $instance->autoPopulate(['page_format' => GetLabelsEnity::LABELS_A6]);
        $this->assertSame(GetLabelsEnity::LABELS_A6, $instance->getPageFormat());
    }

    public function testAutoPopulateSkipsEmptyValues(): void
    {
        $instance = new GetLabelsEnity();
        $instance->autoPopulate(['page_format' => '']);
        $this->assertSame(GetLabelsEnity::LABELS_A4, $instance->getPageFormat()); // unchanged
    }

    public function testAutoPopulateSkipsSpecifiedKeys(): void
    {
        $instance = new GetLabelsEnity();
        $instance->autoPopulate(['page_format' => GetLabelsEnity::LABELS_A6], true, ['page_format']);
        $this->assertSame(GetLabelsEnity::LABELS_A4, $instance->getPageFormat()); // unchanged
    }

    public function testAutoPopulateSkipsNonExistentMethods(): void
    {
        $instance = new GetLabelsEnity();
        $instance->autoPopulate(['non_existent_field' => 'value']);
        $this->assertSame(GetLabelsEnity::LABELS_A4, $instance->getPageFormat()); // unchanged
    }
}
