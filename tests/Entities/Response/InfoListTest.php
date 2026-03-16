<?php

use PHPUnit\Framework\TestCase;
use OlzaApiClient\Entities\Response\InfoList;
use OlzaApiClient\Entities\Response\Info;

class InfoListTest extends TestCase
{
    public function testToArray()
    {
        $infoList = new InfoList();
        
        $info1 = new Info(1, 'Message 1');
        $info2 = new Info(2, 'Message 2');
        
        $infoList->append($info1);
        $infoList->append($info2);

        // Convert InfoList to array
        $result = $infoList->toArray();
        
        // Assert that the array contains the Info objects
        $this->assertCount(2, $result);
        $this->assertSame($info1, $result[0]);
        $this->assertSame($info2, $result[1]);
    }

    public function testFromApiData()
    {
        $apiData = [
            1 => 'Message 1',
            2 => 'Message 2',
        ];

        $infoList = InfoList::fromApiData($apiData);
        
        $this->assertCount(2, $infoList);
        
        $this->assertInstanceOf(Info::class, $infoList[0]);
        $this->assertEquals(1, $infoList[0]->getCode());
        $this->assertEquals('Message 1', $infoList[0]->getMessage());
        
        $this->assertInstanceOf(Info::class, $infoList[1]);
        $this->assertEquals(2, $infoList[1]->getCode());
        $this->assertEquals('Message 2', $infoList[1]->getMessage());
    }

    public function testFromApiDataEmpty()
    {
        $apiData = [];

        $infoList = InfoList::fromApiData($apiData);
        
        $this->assertCount(0, $infoList);
    }

    public function testFromApiDataInvalid()
    {
        $apiData = 'invalid_data';

        $infoList = InfoList::fromApiData($apiData);
        
        $this->assertCount(0, $infoList);
    }
}
