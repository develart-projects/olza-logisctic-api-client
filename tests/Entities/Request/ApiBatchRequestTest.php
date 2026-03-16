<?php

use PHPUnit\Framework\TestCase;
use OlzaApiClient\Entities\Request\ApiBatchRequest;
use OlzaApiClient\Entities\Helpers\HeaderEntity;
use OlzaApiClient\Interfaces\ApiImportInterface;

class ApiBatchRequestTest extends TestCase {

    public function testSetAndGetBody() {
        $apiBatchRequest = new ApiBatchRequest();
        $body = ['key' => 'value'];

        $apiBatchRequest->setBody($body);
        $this->assertSame($body, $apiBatchRequest->getBody());
    }

    public function testSetHeaderFromHelper() {
        $apiBatchRequest = new ApiBatchRequest();
        $headerMock = $this->createMock(HeaderEntity::class);
        $headerMock->method('getApiRequestStructure')->willReturn(['header_key' => 'header_value']);

        $apiBatchRequest->setHeaderFromHelper($headerMock);
        $this->assertArrayHasKey('header', $apiBatchRequest->getBody());
        $this->assertSame(['header_key' => 'header_value'], $apiBatchRequest->getBody()['header']);
    }

    public function testSetPayloadFromHelper() {
        $apiBatchRequest = new ApiBatchRequest();
        $payloadMock = $this->createMock(ApiImportInterface::class);
        $payloadMock->method('getApiRequestStructure')->willReturn(['payload_key' => 'payload_value']);

        $apiBatchRequest->setPayloadFromHelper($payloadMock);
        $this->assertArrayHasKey('payload', $apiBatchRequest->getBody());
        $this->assertSame(['payload_key' => 'payload_value'], $apiBatchRequest->getBody()['payload']);
    }

    public function testAddToPayloadFromHelper() {
        $apiBatchRequest = new ApiBatchRequest();
        $entityMock = $this->createMock(ApiImportInterface::class);
        $entityMock->method('getApiRequestStructure')->willReturn(['item_key' => 'item_value']);

        $apiBatchRequest->addToPayloadFromHelper($entityMock);
        $this->assertArrayHasKey('payload', $apiBatchRequest->getBody());
        $this->assertSame([['item_key' => 'item_value']], $apiBatchRequest->getBody()['payload']);
        
        $entityMock2 = $this->createMock(ApiImportInterface::class);
        $entityMock2->method('getApiRequestStructure')->willReturn(['item_key2' => 'item_value2']);
        
        $apiBatchRequest->addToPayloadFromHelper($entityMock2);
        $this->assertArrayHasKey('payload', $apiBatchRequest->getBody());
        $this->assertSame([['item_key' => 'item_value'], ['item_key2' => 'item_value2']], $apiBatchRequest->getBody()['payload']);
    }

    public function testSetHeaderFromArray() {
        $apiBatchRequest = new ApiBatchRequest();
        $header = ['header_key' => 'header_value'];

        $apiBatchRequest->setHeaderFromArray($header);
        $this->assertArrayHasKey('header', $apiBatchRequest->getBody());
        $this->assertSame($header, $apiBatchRequest->getBody()['header']);
    }

    public function testSetPayloadFromArray() {
        $apiBatchRequest = new ApiBatchRequest();
        $payload = ['payload_key' => 'payload_value'];

        $apiBatchRequest->setPayloadFromArray($payload);
        $this->assertArrayHasKey('payload', $apiBatchRequest->getBody());
        $this->assertSame($payload, $apiBatchRequest->getBody()['payload']);
    }

    public function testAddToPayloadFromArray() {
        $apiBatchRequest = new ApiBatchRequest();
        $item = ['item_key' => 'item_value'];

        $apiBatchRequest->addToPayloadFromArray($item);
        $this->assertArrayHasKey('payload', $apiBatchRequest->getBody());
        $this->assertSame([['item_key' => 'item_value']], $apiBatchRequest->getBody()['payload']);
        
        $item2 = ['item_key2' => 'item_value2'];
        
        $apiBatchRequest->addToPayloadFromArray($item2);
        $this->assertArrayHasKey('payload', $apiBatchRequest->getBody());
        $this->assertSame([['item_key' => 'item_value'], ['item_key2' => 'item_value2']], $apiBatchRequest->getBody()['payload']);
    }
}
