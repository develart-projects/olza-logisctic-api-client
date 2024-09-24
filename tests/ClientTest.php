<?php

use OlzaApiClient\Client;
use OlzaApiClient\Entities\Request\ApiBatchRequest;
use OlzaApiClient\Entities\Response\ApiBatchResponse;
use OlzaApiClient\Exception\ProcessingException;
use OlzaApiClient\Exception\ResponseException;
use OlzaApiClient\Exception\SpeditionException;
use OlzaApiClient\Exception\ValidationException;
use OlzaApiClient\Interfaces\TransportInterface;
use PHPUnit\Framework\TestCase;

class ClientTest extends TestCase
{
    protected $transportServiceMock;
    protected $apiBatchRequestMock;
    
    protected function setUp()
    {
        $this->transportServiceMock = $this->createMock(TransportInterface::class);
        $this->transportServiceMock->method('executePost')->willReturn([
            'status' => [
                'responseCode' => 0,
                'responseDescription' => 'OK'
            ],
            'response' => 'data',
        ]);
        
        $this->apiBatchRequestMock = $this->createMock(ApiBatchRequest::class);
        $this->apiBatchRequestMock->method('getBody')->willReturn([]);
    }
    
    public function testConstructor()
    {
        $client = new Client($this->transportServiceMock);
        $this->assertInstanceOf(Client::class, $client);
    }
    
    public function testCreateShipments()
    {
        $client = new Client($this->transportServiceMock);
        $this->assertInstanceOf(Client::class, $client);
        
        $response = $client->createShipments($this->apiBatchRequestMock);
        $this->assertInstanceOf(ApiBatchResponse::class, $response);
    }
    
    public function testPostShipments()
    {
        $client = new Client($this->transportServiceMock);
        $this->assertInstanceOf(Client::class, $client);
        
        $response = $client->postShipments($this->apiBatchRequestMock);
        $this->assertInstanceOf(ApiBatchResponse::class, $response);
    }
    
    public function testGetLabels()
    {
        $client = new Client($this->transportServiceMock);
        $this->assertInstanceOf(Client::class, $client);
        
        $response = $client->getLabels($this->apiBatchRequestMock);
        $this->assertInstanceOf(ApiBatchResponse::class, $response);
    }
    
    public function testGetStatuses()
    {
        $client = new Client($this->transportServiceMock);
        $this->assertInstanceOf(Client::class, $client);
        
        $response = $client->getStatuses($this->apiBatchRequestMock);
        $this->assertInstanceOf(ApiBatchResponse::class, $response);
    }
    
    public function testGetShipmentsDetails()
    {
        $client = new Client($this->transportServiceMock);
        $this->assertInstanceOf(Client::class, $client);
        
        $response = $client->getShipmentsDetails($this->apiBatchRequestMock);
        $this->assertInstanceOf(ApiBatchResponse::class, $response);
    }
    
    public function testGetReceipt()
    {
        $client = new Client($this->transportServiceMock);
        $this->assertInstanceOf(Client::class, $client);
        
        $response = $client->getReceipt($this->apiBatchRequestMock);
        $this->assertInstanceOf(ApiBatchResponse::class, $response);
    }
    
    public function testResponseException()
    {
        $transportServiceMock = $this->createMock(TransportInterface::class);
        $transportServiceMock->method('executePost')->willReturn([]);
        
        $client = new Client($transportServiceMock);
        
        $this->expectException(ResponseException::class);
        $client->createShipments($this->apiBatchRequestMock);
    }
    
    public function testValidationException()
    {
        $transportServiceMock = $this->createMock(TransportInterface::class);
        $transportServiceMock->method('executePost')->willReturn([
            'status' => [
                'responseCode' => 900,
                'responseDescription' => 'error'
            ],
            'response' => 'data',
        ]);
        
        $client = new Client($transportServiceMock);
        
        $this->expectException(ValidationException::class);
        $client->createShipments($this->apiBatchRequestMock);
    }
    
    public function testSpeditionException()
    {
        $transportServiceMock = $this->createMock(TransportInterface::class);
        $transportServiceMock->method('executePost')->willReturn([
            'status' => [
                'responseCode' => 901,
                'responseDescription' => 'error'
            ],
            'response' => 'data',
        ]);
        
        $client = new Client($transportServiceMock);
        
        $this->expectException(SpeditionException::class);
        $client->createShipments($this->apiBatchRequestMock);
    }
    
    public function testProcessingException()
    {
        $transportServiceMock = $this->createMock(TransportInterface::class);
        $transportServiceMock->method('executePost')->willReturn([
            'status' => [
                'responseCode' => 55,
                'responseDescription' => 'error'
            ],
            'response' => 'data',
        ]);
        
        $client = new Client($transportServiceMock);
        
        $this->expectException(ProcessingException::class);
        $client->createShipments($this->apiBatchRequestMock);
    }
}
