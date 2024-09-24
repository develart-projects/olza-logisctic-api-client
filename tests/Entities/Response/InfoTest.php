<?php

use OlzaApiClient\Entities\Response\Info;
use PHPUnit\Framework\TestCase;

class InfoTest extends TestCase
{
    public function testConstructorSetsCodeAndMessage()
    {
        $code = Info::DELIVERY_TO_ISLAND;
        $message = 'Delivery to island';

        $info = new Info($code, $message);

        $this->assertSame($code, $info->getCode());
        $this->assertSame($message, $info->getMessage());
    }
}
