<?php

use OlzaApiClient\Entities\Helpers\HeaderEntity;
use PHPUnit\Framework\TestCase;

final class HeaderEntityTest extends TestCase
{
    public function testDefaultValues(): void
    {
        $instance = new HeaderEntity();
        
        $this->assertSame(HeaderEntity::LANG_CS, $instance->getLanguage());
        $this->assertSame(null, $instance->getApiUser());
        $this->assertSame(null, $instance->getApiPassword());
        $this->assertSame([
            'apiUser' => null,
            'apiPassword' => null,
            'language' => HeaderEntity::LANG_CS,
        ], $instance->getApiRequestStructure());
    }
    
    public function testSettersAndGetters(): void
    {
        $instance = new HeaderEntity();
        
        $instance->setLanguage(HeaderEntity::LANG_PL);
        $this->assertSame(HeaderEntity::LANG_PL, $instance->getLanguage());
        
        $instance->setApiUser('test');
        $this->assertSame('test', $instance->getApiUser());
        
        $instance->setApiPassword('pass');
        $this->assertSame('pass', $instance->getApiPassword());
    }
    
    public function testGetApiRequestStructure(): void
    {
        $instance = new HeaderEntity();
        $instance->setLanguage(HeaderEntity::LANG_PL);
        $instance->setApiUser('test');
        $instance->setApiPassword('pass');
        
        $this->assertSame([
            'apiUser' => 'test',
            'apiPassword' => 'pass',
            'language' => HeaderEntity::LANG_PL,
        ], $instance->getApiRequestStructure());
    }
}
