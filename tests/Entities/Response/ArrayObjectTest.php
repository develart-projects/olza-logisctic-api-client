<?php

use OlzaApiClient\Entities\Response\ProcessedList;
use PHPUnit\Framework\TestCase;

class ProcessedListTest extends TestCase
{
    public function testToArrayReturnsArray()
    {
        $processedList = new ProcessedList();
        $processedList->append('item1');
        $processedList->append('item2');

        $array = $processedList->toArray();

        $this->assertIsArray($array);
        $this->assertCount(2, $array);
        $this->assertEquals(['item1', 'item2'], $array);
    }

    public function testFromApiDataReturnsProcessedList()
    {
        $data = [
            'list_processed' => [
                ['shipmentId' => 1, 'apiCustomRef' => '123'],
                ['shipmentId' => 2, 'apiCustomRef' => '456'],
            ],
        ];

        $processedList = ProcessedList::fromApiData($data);

        $this->assertInstanceOf(ProcessedList::class, $processedList);
        $this->assertCount(2, $processedList);
    }

    public function testFromApiDataReturnsEmptyProcessedListWhenNoData()
    {
        $data = [];

        $processedList = ProcessedList::fromApiData($data);

        $this->assertInstanceOf(ProcessedList::class, $processedList);
        $this->assertCount(0, $processedList);
    }

    public function testHasItemOfIdReturnsTrueWhenItemExists()
    {
        $processedList = new ProcessedList();
        $processedList->append(['shipmentId' => 1, 'apiCustomRef' => '123']);

        $this->assertTrue($processedList->hasItemOfId(0));
    }

    public function testHasItemOfIdReturnsFalseWhenItemDoesNotExist()
    {
        $processedList = new ProcessedList();
        $processedList->append(['shipmentId' => 1, 'apiCustomRef' => '123']);

        $this->assertFalse($processedList->hasItemOfId(1));
    }
}