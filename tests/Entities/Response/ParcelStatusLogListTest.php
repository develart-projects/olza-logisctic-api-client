<?php

use OlzaApiClient\Entities\Response\ParcelStatusLog;
use OlzaApiClient\Entities\Response\ParcelStatusLogList;
use PHPUnit\Framework\TestCase;

class ParcelStatusLogListTest extends TestCase
{
    public function testAddLog()
    {
        $logList = new ParcelStatusLogList();
        $log = new ParcelStatusLog();
        $logList->addLog($log);

        $this->assertCount(1, $logList->toArray());
        $this->assertSame($log, $logList->toArray()[0]);
    }

    public function testFromApiData()
    {
        $data = [
            ['login' => 'login1', 'packageStatus' => 'pending'],
            ['login' => 'login2', 'packageStatus' => 'delivered'],
        ];

        $logList = ParcelStatusLogList::fromApiData($data);

        $this->assertCount(2, $logList->toArray());
        $this->assertSame('pending', $logList->toArray()[0]->getParcelStatus());
        $this->assertSame('delivered', $logList->toArray()[1]->getParcelStatus());
    }

    public function testToArray()
    {
        $logList = new ParcelStatusLogList();
        $log1 = new ParcelStatusLog();
        $log2 = new ParcelStatusLog();
        $logList->addLog($log1);
        $logList->addLog($log2);

        $this->assertSame([$log1, $log2], $logList->toArray());
    }

    public function testCount()
    {
        $logList = new ParcelStatusLogList();

        $this->assertSame(0, $logList->count());

        $logList->addLog(new ParcelStatusLog());

        $this->assertSame(1, $logList->count());
    }
}