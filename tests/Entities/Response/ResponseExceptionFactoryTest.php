<?php

use PHPUnit\Framework\TestCase;
use OlzaApiClient\Entities\Response\ResponseExceptionFactory;
use OlzaApiClient\Exception\ApiException;
use OlzaApiClient\Exception\ApiClientException;
use OlzaApiClient\Exception\ProcessingException;
use OlzaApiClient\Exception\ResponseException;
use OlzaApiClient\Exception\SpeditionException;
use OlzaApiClient\Exception\ValidationException;

class ResponseExceptionFactoryTest extends TestCase
{
    public function testCreateExceptionThrowsResponseExceptionWhenErrorDataIsEmpty()
    {
        $this->expectException(ResponseException::class);
        ResponseExceptionFactory::createException([]);
    }
    public function testCreateExceptionThrowsResponseExceptionWhenMissingBackReference()
    {
        $this->expectException(ResponseException::class);
        ResponseExceptionFactory::createException(['responseCode' => 400, 'responseDescription' => 'Response description']);
    }

    public function testCreateValidationException()
    {
        $errorData = [
            'responseCode' => 900,
            'apiCustomRef' => 'test',
            'responseDescription' => 'Response description'
        ];
        $exception = ResponseExceptionFactory::createException($errorData);
        $this->assertInstanceOf(ValidationException::class, $exception);
    }

    public function testCreateSpeditionException()
    {
        $errorData = [
            'responseCode' => 901,
            'apiCustomRef' => 'test',
            'responseDescription' => 'Response description'
        ];
        $exception = ResponseExceptionFactory::createException($errorData);
        $this->assertInstanceOf(SpeditionException::class, $exception);
    }

    public function testCreateProcessingException()
    {
        $errorData = [
            'responseCode' => 1,
            'apiCustomRef' => 'test',
            'responseDescription' => 'Response description'
        ];
        $exception = ResponseExceptionFactory::createException($errorData);
        $this->assertInstanceOf(ProcessingException::class, $exception);
    }
}