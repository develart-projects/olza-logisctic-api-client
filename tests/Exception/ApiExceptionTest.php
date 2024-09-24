<?php
namespace Test\Exception;

use PHPUnit\Framework\TestCase;

abstract class ApiExceptionTest extends TestCase
{
    protected $class;
    
    public function testDefaultValues(): void
    {
        $instance = new $this->class();
        
        $this->assertSame(null, $instance->getReferenceId());
    }
    
    public function testSettersAndGetters(): void
    {
        $instance = new $this->class();
        
        $instance->setReferenceId(123);
        $this->assertSame(123, $instance->getReferenceId());
    }
    
    public function testCreateFromApiStatus(): void
    {
        $instance = $this->class::createFromApiStatus([
            'responseCode' => 123,
            'responseDescription' => 'test description',
            'apiCustomRef' => 'custom ref',
        ]);
        
        $this->assertInstanceOf($this->class, $instance);
        $this->assertSame(123, $instance->getCode());
        $this->assertSame('test description', $instance->getMessage());
        $this->assertSame('custom ref', $instance->getReferenceId());
    }
}
