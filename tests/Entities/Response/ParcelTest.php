<?php

use OlzaApiClient\Entities\Response\Parcel;
use OlzaApiClient\Entities\Response\ParcelStatusLogList;
use PHPUnit\Framework\TestCase;

final class ParcelTest extends TestCase
{
    public function testDefaultValues(): void
    {
        $instance = new Parcel();
        
        $this->assertSame('', $instance->getId());
        $this->assertSame('', $instance->getShipmentId());
        $this->assertSame('', $instance->getParcelStatus());
        $this->assertSame('', $instance->getPackageType());
        $this->assertSame('', $instance->getSpeditionExternalId());
        $this->assertSame('', $instance->getSpeditionExternalBarcode());
        $this->assertSame('', $instance->getSpeditionExternalTrackingUrl());
        $this->assertSame(null, $instance->getDeliveryDate());
        $this->assertSame(null, $instance->getParcelStatusHistory());
    }
    
    public function testConstructor(): void
    {
        $instance = new Parcel('id123', 'type456');
        
        $this->assertSame('id123', $instance->getId());
        $this->assertSame('type456', $instance->getPackageType());
    }
    
    public function testSettersAndGetters(): void
    {
        $instance = new Parcel();
        
        $instance->setId('123');
        $this->assertSame('123', $instance->getId());
        
        $instance->setShipmentId('456');
        $this->assertSame('456', $instance->getShipmentId());
        
        $instance->setPackageType('packtype');
        $this->assertSame('packtype', $instance->getPackageType());
        
        $instance->setSpeditionExternalId('ext123');
        $this->assertSame('ext123', $instance->getSpeditionExternalId());
        
        $instance->setSpeditionExternalBarcode('456');
        $this->assertSame('456', $instance->getSpeditionExternalBarcode());
        
        $instance->setSpeditionExternalTrackingUrl('trackurl');
        $this->assertSame('trackurl', $instance->getSpeditionExternalTrackingUrl());
        
        $deliveryDate = $this->createMock(DateTime::class);
        $instance->setDeliveryDate($deliveryDate);
        $this->assertSame($deliveryDate, $instance->getDeliveryDate());
        
        $parcelStatusLogList = $this->createMock(ParcelStatusLogList::class);
        $instance->setParcelStatusHistory($parcelStatusLogList);
        $this->assertSame($parcelStatusLogList, $instance->getParcelStatusHistory());
        
        $instance->setParcelStatus('status_test');
        $this->assertSame('status_test', $instance->getParcelStatus());
    }
    
    public function testLoadFromApiData(): void
    {
        $instance = Parcel::fromApiData([
            'packageId' => '123',
            'shipmentId' => '456',
            'packageType' => 'packtype',
            'speditionExternalId' => 'ext123',
            'speditionExternalBarcode' => '456',
            'speditionExternalTrackingUrl' => 'trackurl',
            'deliveryDate' => '2025-01-01 00:00:00',
            'packageStatusHistory' => [],
            'packageStatus' => 'status_test',
        ]);
        
        $this->assertSame('123', $instance->getId());
        $this->assertSame('456', $instance->getShipmentId());
        $this->assertSame('packtype', $instance->getPackageType());
        $this->assertSame('ext123', $instance->getSpeditionExternalId());
        $this->assertSame('456', $instance->getSpeditionExternalBarcode());
        $this->assertSame('trackurl', $instance->getSpeditionExternalTrackingUrl());
        $this->assertEquals(new DateTime('2025-01-01 00:00:00'), $instance->getDeliveryDate());
        $this->assertSame(null, $instance->getParcelStatusHistory());
        $this->assertSame('status_test', $instance->getParcelStatus());
    }
}
