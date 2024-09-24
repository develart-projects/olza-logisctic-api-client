<?php

use OlzaApiClient\Entities\Response\ApiBatchResponse;
use OlzaApiClient\Entities\Response\DataStream;
use OlzaApiClient\Entities\Response\ErrorList;
use OlzaApiClient\Entities\Response\ProcessedList;
use PHPUnit\Framework\TestCase;

class ApiBatchResponseTest extends TestCase
{
    private $processedListMock;
    private $errorListMock;
    private $dataStreamMock;

    protected function setUp(): void
    {
        $this->processedListMock = $this->createMock(ProcessedList::class);
        $this->errorListMock = $this->createMock(ErrorList::class);
        $this->dataStreamMock = $this->createMock(DataStream::class);
    }

    public function testConstructorAndGetters()
    {
        $apiBatchResponse = new ApiBatchResponse($this->processedListMock, $this->errorListMock, $this->dataStreamMock);

        $this->assertSame($this->processedListMock, $apiBatchResponse->getProcessedList());
        $this->assertSame($this->errorListMock, $apiBatchResponse->getErrorList());
        $this->assertSame($this->dataStreamMock, $apiBatchResponse->getDataStream());
    }

    public function testSetProcessedList()
    {
        $apiBatchResponse = new ApiBatchResponse($this->processedListMock, $this->errorListMock, $this->dataStreamMock);

        $newProcessedListMock = $this->createMock(ProcessedList::class);
        $apiBatchResponse->setProcessedList($newProcessedListMock);

        $this->assertSame($newProcessedListMock, $apiBatchResponse->getProcessedList());
    }

    public function testSetErrorList()
    {
        $apiBatchResponse = new ApiBatchResponse($this->processedListMock, $this->errorListMock, $this->dataStreamMock);

        $newErrorListMock = $this->createMock(ErrorList::class);
        $apiBatchResponse->setErrorList($newErrorListMock);

        $this->assertSame($newErrorListMock, $apiBatchResponse->getErrorList());
    }

    public function testSetDataStream()
    {
        $apiBatchResponse = new ApiBatchResponse($this->processedListMock, $this->errorListMock, $this->dataStreamMock);

        $newDataStreamMock = $this->createMock(DataStream::class);
        $apiBatchResponse->setDataStream($newDataStreamMock);

        $this->assertSame($newDataStreamMock, $apiBatchResponse->getDataStream());
    }

    public function testCreateStaticMethod()
    {
        $apiBatchResponse = ApiBatchResponse::create($this->processedListMock, $this->errorListMock, $this->dataStreamMock);

        $this->assertInstanceOf(ApiBatchResponse::class, $apiBatchResponse);
        $this->assertSame($this->processedListMock, $apiBatchResponse->getProcessedList());
        $this->assertSame($this->errorListMock, $apiBatchResponse->getErrorList());
        $this->assertSame($this->dataStreamMock, $apiBatchResponse->getDataStream());
    }
}

