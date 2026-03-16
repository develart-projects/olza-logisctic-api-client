<?php

use OlzaApiClient\Entities\Response\Billing;
use OlzaApiClient\Entities\Response\Cod;
use OlzaApiClient\Entities\Response\InfoList;
use OlzaApiClient\Entities\Response\PackagesSummary;
use OlzaApiClient\Entities\Response\Parcel;
use OlzaApiClient\Entities\Response\ParcelList;
use OlzaApiClient\Entities\Response\Preset;
use OlzaApiClient\Entities\Response\Recipient;
use OlzaApiClient\Entities\Response\Sender;
use OlzaApiClient\Entities\Response\ServiceList;
use OlzaApiClient\Entities\Response\Shipment;
use OlzaApiClient\Entities\Response\SpecificData;
use PHPUnit\Framework\TestCase;

final class ShipmentTest extends TestCase
{
    private $parcelListMock;
    private $billingMock;
    private $senderMock;
    private $recipientMock;
    private $serviceListMock;
    private $codMock;
    private $presetMock;
    private $specificDataMock;
    private $packagesSummaryMock;
    private $infoListMock;
    
    protected function setUp(): void
    {
        $this->parcelListMock = $this->createMock(ParcelList::class);
        $this->billingMock = $this->createMock(Billing::class);
        $this->senderMock = $this->createMock(Sender::class);
        $this->recipientMock = $this->createMock(Recipient::class);
        $this->serviceListMock = $this->createMock(ServiceList::class);
        $this->codMock = $this->createMock(Cod::class);
        $this->presetMock = $this->createMock(Preset::class);
        $this->specificDataMock = $this->createMock(SpecificData::class);
        $this->packagesSummaryMock = $this->createMock(PackagesSummary::class);
        $this->infoListMock = $this->createMock(InfoList::class);
    }
    
    public function testDefaultValues(): void
    {
        $instance = new Shipment();
        
        $this->assertInstanceOf(ParcelList::class, $instance->getParcels());
        $this->assertInstanceOf(ServiceList::class, $instance->getServices());
        $this->assertInstanceOf(Billing::class, $instance->getBillingData());
        $this->assertInstanceOf(Sender::class, $instance->getSender());
        $this->assertInstanceOf(Recipient::class, $instance->getRecipient());
        $this->assertInstanceOf(ServiceList::class, $instance->getServices());
        $this->assertInstanceOf(Cod::class, $instance->getCod());
        $this->assertInstanceOf(Preset::class, $instance->getPreset());
        $this->assertInstanceOf(SpecificData::class, $instance->getSpecific());
        $this->assertInstanceOf(PackagesSummary::class, $instance->getPackagesSummary());
        $this->assertInstanceOf(InfoList::class, $instance->getInfoMessages());
        $this->assertSame(null, $instance->getApiCustomRef());
        $this->assertSame(null, $instance->getShipmentId());
        $this->assertSame(null, $instance->getShipmentStatus());
    }
    
    public function testSettersAndGetters(): void
    {
        $instance = new Shipment();
        
        $instance->setParcels($this->parcelListMock);
        $this->assertSame($this->parcelListMock, $instance->getParcels());
        
        $instance->setServices($this->serviceListMock);
        $this->assertSame($this->serviceListMock, $instance->getServices());
        
        $instance->setBillingData($this->billingMock);
        $this->assertSame($this->billingMock, $instance->getBillingData());
        
        $instance->setSender($this->senderMock);
        $this->assertSame($this->senderMock, $instance->getSender());
        
        $instance->setRecipient($this->recipientMock);
        $this->assertSame($this->recipientMock, $instance->getRecipient());
        
        $instance->setCod($this->codMock);
        $this->assertSame($this->codMock, $instance->getCod());
        
        $instance->setPreset($this->presetMock);
        $this->assertSame($this->presetMock, $instance->getPreset());
        
        $instance->setSpecific($this->specificDataMock);
        $this->assertSame($this->specificDataMock, $instance->getSpecific());
        
        $instance->setPackagesSummary($this->packagesSummaryMock);
        $this->assertSame($this->packagesSummaryMock, $instance->getPackagesSummary());
        
        $instance->setInfoMessages($this->infoListMock);
        $this->assertSame($this->infoListMock, $instance->getInfoMessages());
        
        $instance->setApiCustomRef('123');
        $this->assertSame('123', $instance->getApiCustomRef());
        
        $instance->setShipmentId('456');
        $this->assertSame('456', $instance->getShipmentId());
        
        $instance->setShipmentStatus('status_a');
        $this->assertSame('status_a', $instance->getShipmentStatus());
    }
    
    public function testLoadFromApiData(): void
    {
        $instance = Shipment::fromApiData([
            'apiCustomRef' => '123',
            'shipmentId' => '456',
            'shipmentStatus' => 'status_a',
            'packageList' => [],
            'services' => [],
            'billingData' => [],
            'sender' => [],
            'recipient' => [],
            'cod' => [],
            'preset' => [],
            'specific' => [],
            'packages' => [],
            'infoMessages' => [],
        ]);
        
        $this->assertSame('123', $instance->getApiCustomRef());
        $this->assertSame('456', $instance->getShipmentId());
        $this->assertSame('status_a', $instance->getShipmentStatus());
        $this->assertInstanceOf(ParcelList::class, $instance->getParcels());
        $this->assertInstanceOf(ServiceList::class, $instance->getServices());
        $this->assertInstanceOf(Billing::class, $instance->getBillingData());
        $this->assertInstanceOf(Sender::class, $instance->getSender());
        $this->assertInstanceOf(Recipient::class, $instance->getRecipient());
        $this->assertInstanceOf(ServiceList::class, $instance->getServices());
        $this->assertInstanceOf(Cod::class, $instance->getCod());
        $this->assertInstanceOf(Preset::class, $instance->getPreset());
        $this->assertInstanceOf(SpecificData::class, $instance->getSpecific());
        $this->assertInstanceOf(PackagesSummary::class, $instance->getPackagesSummary());
        $this->assertInstanceOf(InfoList::class, $instance->getInfoMessages());
    }

    public function testLoadFromApiDataWithFullData(): void
    {
        $instance = Shipment::fromApiData([
            'apiCustomRef' => 'ref-001',
            'shipmentId' => 'shp-001',
            'shipmentStatus' => 'delivered',
            'packageIds' => ['pkg-001', 'pkg-002'],
            'exchangePackageIds' => ['exch-001'],
            'packageList' => [['packageId' => 'list-001', 'packageType' => Parcel::PARCEL_TYPE_NORMAL]],
            'billingData' => ['netPrice' => 10.0, 'vatRate' => 21, 'currency' => 'CZK'],
            'sender' => ['senderName' => 'Test Sender'],
            'recipient' => ['recipientFirstname' => 'John'],
            'services' => [['code' => 'SVC1', 'value' => '1']],
            'preset' => ['senderCountry' => 'CZ', 'recipientCountry' => 'SK', 'speditionCode' => 'SP1', 'shipmentType' => 'normal'],
            'cod' => ['codAmount' => 100.0, 'codReference' => 'REF-001'],
            'specific' => ['marketPlaceId' => 'MP001'],
            'packages' => ['packageCount' => 2, 'weight' => 1.5],
            'infoMessages' => [1 => 'Delivery to island'],
        ]);

        $this->assertSame('ref-001', $instance->getApiCustomRef());
        $this->assertInstanceOf(Billing::class, $instance->getBillingData());
        $this->assertInstanceOf(Sender::class, $instance->getSender());
        $this->assertInstanceOf(Recipient::class, $instance->getRecipient());
        $this->assertInstanceOf(Preset::class, $instance->getPreset());
        $this->assertInstanceOf(Cod::class, $instance->getCod());
        $this->assertInstanceOf(SpecificData::class, $instance->getSpecific());
        $this->assertInstanceOf(PackagesSummary::class, $instance->getPackagesSummary());
        $this->assertInstanceOf(InfoList::class, $instance->getInfoMessages());
        $this->assertSame(1, $instance->getParcels()->count()); // packageList overrides packageIds
    }

    public function testHasApiCustomRef(): void
    {
        $instance = new Shipment();
        $this->assertFalse($instance->hasApiCustomRef());

        $instance->setApiCustomRef('ref-123');
        $this->assertTrue($instance->hasApiCustomRef());
    }

    public function testAddParcel(): void
    {
        $instance = new Shipment();
        $parcel = new Parcel('parcel-id', Parcel::PARCEL_TYPE_NORMAL);

        $instance->addParcel($parcel);
        $this->assertSame(1, $instance->getParcels()->count());
    }
}
