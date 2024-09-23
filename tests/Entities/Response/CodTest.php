<?php declare(strict_types=1);

use OlzaApiClient\Entities\Response\Cod;
use PHPUnit\Framework\TestCase;

final class CodTest extends TestCase
{
    public function testDefaultValues(): void
    {
        $instance = new Cod();
        
        $this->assertSame(0, $instance->getCodAmount());
        $this->assertSame(null, $instance->getCodReference());
        $this->assertSame(null, $instance->getCodCurrency());
        $this->assertSame(false, $instance->isCodConfirmed());
    }
    
    public function testSettersAndGetters(): void
    {
        $instance = new Cod();
        
        $instance->setCodAmount(11.51);
        $instance->setCodReference('test reference');
        $instance->setCodCurrency('CZK');
        $instance->setCodConfirmed();
        
        $this->assertSame(11.51, $instance->getCodAmount());
        $this->assertSame('test reference', $instance->getCodReference());
        $this->assertSame('CZK', $instance->getCodCurrency());
        $this->assertSame(true, $instance->isCodConfirmed());
    }
    
    public function testLoadFromApiData(): void
    {
        $instance = Cod::fromApiData([
            'codAmount' => 11.51,
            'codReference' => 'test reference',
            'codCurrency' => 'CZK',
            'codConfirmed' => true,
        ]);
        
        $this->assertSame(11.51, $instance->getCodAmount());
        $this->assertSame('test reference', $instance->getCodReference());
        $this->assertSame('CZK', $instance->getCodCurrency());
        $this->assertSame(true, $instance->isCodConfirmed());
    }
}
