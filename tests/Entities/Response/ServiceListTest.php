<?php

use OlzaApiClient\Entities\Response\Service;
use OlzaApiClient\Entities\Response\ServiceList;
use PHPUnit\Framework\TestCase;

class ServiceListTest extends TestCase
{
    public function testAddService()
    {
        $serviceList = new ServiceList();
        $service = new Service();
        $service->setCode('123');
        
        $serviceList->addService($service);
        
        $this->assertCount(1, $serviceList->toArray());
        $this->assertSame('123', $serviceList->toArray()['123']->getCode());
    }

    public function testAddServices()
    {
        $serviceList = new ServiceList();
        $service1 = new Service();
        $service1->setCode('123');
        $service2 = new Service();
        $service2->setCode('456');
        
        $serviceList->addService($service1);
        
        $anotherServiceList = new ServiceList();
        $anotherServiceList->addService($service2);
        
        $serviceList->addServices($anotherServiceList);
        
        $this->assertCount(2, $serviceList->toArray());
        $this->assertSame('123', $serviceList->toArray()['123']->getCode());
        $this->assertSame('456', $serviceList->toArray()['456']->getCode());
    }

    public function testToArray()
    {
        $serviceList = new ServiceList();
        $service1 = new Service();
        $service1->setCode('123');
        $service2 = new Service();
        $service2->setCode('456');
        
        $serviceList->addService($service1);
        $serviceList->addService($service2);
        
        $expectedArray = [
            '123' => $service1,
            '456' => $service2,
        ];
        
        $this->assertEquals($expectedArray, $serviceList->toArray());
    }
    
    public function testCount()
    {
        $serviceList = new ServiceList();
        $service1 = new Service();
        $service1->setCode('123');
        $service2 = new Service();
        $service2->setCode('456');
        
        $serviceList->addService($service1);
        $serviceList->addService($service2);
        
        $this->assertSame(2, $serviceList->count());
    }
    
    public function testGetFirstService()
    {
        $serviceList = new ServiceList();
        $service1 = new Service();
        $service1->setCode('123');
        $service2 = new Service();
        $service2->setCode('456');
        
        $serviceList->addService($service1);
        $serviceList->addService($service2);
        
        $this->assertSame($service1, $serviceList->getFirstService());
    }
    
    public function testLoadFromApiData()
    {
        $serviceList = ServiceList::fromApiData([
            '123' => [
                'code' => '123',
            ],
            '456' => [
                'code' => '456',
            ],
        ]);
        
        $this->assertCount(2, $serviceList->toArray());
        $this->assertSame('123', $serviceList->toArray()['123']->getCode());
        $this->assertSame('456', $serviceList->toArray()['456']->getCode());
    }
    
    public function testFromCodeVector()
    {
        $serviceList = ServiceList::fromCodeVector(['123', '456']);
        
        $this->assertCount(2, $serviceList->toArray());
        $this->assertSame('123', $serviceList->toArray()['123']->getCode());
        $this->assertSame('456', $serviceList->toArray()['456']->getCode());
    }
}