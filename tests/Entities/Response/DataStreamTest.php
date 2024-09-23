<?php

use OlzaApiClient\Entities\Response\DataStream;
use PHPUnit\Framework\TestCase;

class DataStreamTest extends TestCase
{
    /**
     * Test constructor and getData method
     */
    public function testConstructorAndGetData()
    {
        $data = 'encoded_string';
        $dataStream = new DataStream($data);

        $this->assertEquals($data, $dataStream->getData());
    }

    /**
     * Test setData method
     */
    public function testSetData()
    {
        $dataStream = new DataStream();
        $data = 'new_encoded_string';
        $dataStream->setData($data);

        $this->assertEquals($data, $dataStream->getData());
    }

    /**
     * Test getDataDecoded method
     */
    public function testGetDataDecoded()
    {
        $data = base64_encode('plain_string');
        $dataStream = new DataStream($data);

        $this->assertEquals('plain_string', $dataStream->getDataDecoded());
    }

    /**
     * Test fromApiData static method
     */
    public function testFromApiData()
    {
        $apiData = [
            'data_stream' => 'encoded_string'
        ];
        $dataStream = DataStream::fromApiData($apiData);

        $this->assertInstanceOf(DataStream::class, $dataStream);
        $this->assertEquals('encoded_string', $dataStream->getData());
    }

    /**
     * Test fromApiData with empty data
     */
    public function testFromApiDataWithEmptyData()
    {
        $apiData = [];
        $dataStream = DataStream::fromApiData($apiData);

        $this->assertInstanceOf(DataStream::class, $dataStream);
        $this->assertEquals('', $dataStream->getData());
    }
}
