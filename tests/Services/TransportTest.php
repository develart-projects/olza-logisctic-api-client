<?php

use PHPUnit\Framework\TestCase;
use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\RequestFactoryInterface;
use Psr\Http\Message\StreamFactoryInterface;
use Psr\Http\Message\ResponseInterface;
use OlzaApiClient\Services\Transport;
use OlzaApiClient\Exception\ApiTransportException;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\StreamInterface;

class TransportTest extends TestCase
{
    private $httpClientMock;
    private $requestFactoryMock;
    private $streamFactoryMock;
    private $responseMock;
    private $requestMock;
    private $streamMock;

    protected function setMocks($responseStatus = 200): void
    {
        $this->streamMock = $this->createMock(StreamInterface::class);
        $this->streamMock->method('getContents')->willReturn('{"success":' . ($responseStatus == 200 ? 'true' : 'false') .'}');
        
        $this->responseMock = $this->createMock(ResponseInterface::class);
        $this->responseMock->method('getStatusCode')->willReturn($responseStatus);
        $this->responseMock->method('getReasonPhrase')->willReturn('Reason phrase');
        $this->responseMock->method('getBody')->willReturn($this->streamMock);
        
        $this->httpClientMock = $this->createMock(ClientInterface::class);
        $this->httpClientMock->method('sendRequest')->willReturn($this->responseMock);
        
        $this->requestMock = $this->createMock(RequestInterface::class);
        $this->requestMock->method('withHeader')->willReturn($this->requestMock);
        $this->requestMock->method('withBody')->willReturn($this->requestMock);
        
        $this->requestFactoryMock = $this->createMock(RequestFactoryInterface::class);
        $this->requestFactoryMock->method('createRequest')->willReturn($this->requestMock);
        
        $this->streamFactoryMock = $this->createMock(StreamFactoryInterface::class);
    }

    public function testExecuteGetSuccess()
    {
        $this->setMocks();
        
        $transport = new Transport('https://api.example.com', $this->httpClientMock, $this->requestFactoryMock, $this->streamFactoryMock);
        $this->assertInstanceOf(Transport::class, $transport);
        
        $response = $transport->executeGet('/test-api');
        $this->assertSame([
            'success' => true
        ], $response);
    }
    
    public function testExecuteGetFailWithApiTransportException()
    {
        $this->setMocks(404);
        
        $transport = new Transport('https://api.example.com', $this->httpClientMock, $this->requestFactoryMock, $this->streamFactoryMock);
        $this->assertInstanceOf(Transport::class, $transport);
        
        $this->expectException(ApiTransportException::class);
        $transport->executeGet('/test-api');
    }
    
    public function testExecutePostSuccess()
    {
        $this->setMocks();
        
        $transport = new Transport('https://api.example.com', $this->httpClientMock, $this->requestFactoryMock, $this->streamFactoryMock);
        $this->assertInstanceOf(Transport::class, $transport);
        
        $response = $transport->executePost('test-api', ['data' => 'value']);
        $this->assertSame([
            'success' => true
        ], $response);
    }
    
    public function testExecutePostFailWithApiTransportException()
    {
        $this->setMocks(404);
        
        $transport = new Transport('https://api.example.com', $this->httpClientMock, $this->requestFactoryMock, $this->streamFactoryMock);
        $this->assertInstanceOf(Transport::class, $transport);
        
        $this->expectException(ApiTransportException::class);
        $transport->executePost('test-api', ['data' => 'value']);
    }

    public function testConstructorThrowsRuntimeExceptionForMissingRequestFactory()
    {
        $this->setMocks();
        
        $this->expectException(RuntimeException::class);
        new Transport('https://api.example.com', $this->httpClientMock, null, $this->streamFactoryMock);
    }

    public function testConstructorThrowsRuntimeExceptionForMissingStreamFactory()
    {
        $this->setMocks();
        
        $this->expectException(RuntimeException::class);
        new Transport('https://api.example.com', $this->httpClientMock, $this->requestFactoryMock, null);
    }
}
