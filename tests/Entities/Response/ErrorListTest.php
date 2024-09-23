<?php

use PHPUnit\Framework\TestCase;
use OlzaApiClient\Entities\Response\ErrorList;
use OlzaApiClient\Exception\ProcessingException;
use OlzaApiClient\Exception\SpeditionException;
use OlzaApiClient\Exception\ValidationException;

class ErrorListTest extends TestCase
{
    public function testToArrayReturnsArrayCopy()
    {
        $errorList = new ErrorList();
        $errorList->offsetSet(0, 'Error1');
        $errorList->offsetSet(1, 'Error2');

        $result = $errorList->toArray();
        
        $this->assertIsArray($result);
        $this->assertCount(2, $result);
        $this->assertEquals('Error1', $result[0]);
        $this->assertEquals('Error2', $result[1]);
    }

    public function testFromApiDataEmptyList()
    {
        $data = ['list_error' => []];
        $errorList = ErrorList::fromApiData($data);
        
        $this->assertInstanceOf(ErrorList::class, $errorList);
        $this->assertCount(0, $errorList);
    }

    public function testFromApiDataWithErrors()
    {
        $errorData = [
            'list_error' => [
                ['responseCode' => 132, 'shipmentId' => 10, 'message' => 'Error 1 occurred'],
                ['responseCode' => 900, 'shipmentId' => 11, 'message' => 'Error 2 occurred'],
                ['responseCode' => 901, 'shipmentId' => 12, 'message' => 'Error 3 occurred'],
            ]
        ];

        $errorList = ErrorList::fromApiData($errorData);
        
        $this->assertInstanceOf(ErrorList::class, $errorList);
        $this->assertCount(3, $errorList);
        $this->assertInstanceOf(ProcessingException::class, $errorList->offsetGet(0));
        $this->assertInstanceOf(ValidationException::class, $errorList->offsetGet(1));
        $this->assertInstanceOf(SpeditionException::class, $errorList->offsetGet(2));
    }
}
