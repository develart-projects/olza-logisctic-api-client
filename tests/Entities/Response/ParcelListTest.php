<?php

use PHPUnit\Framework\TestCase;
use OlzaApiClient\Entities\Response\ParcelList;
use OlzaApiClient\Entities\Response\Parcel;

class ParcelListTest extends TestCase
{
    public function testAddParcel()
    {
        $parcelList = new ParcelList();
        $parcel = new Parcel('123', 'TypeA');

        $parcelList->addParcel($parcel);

        $this->assertSame($parcel, $parcelList->getFirstParcel());
    }

    public function testAddParcels()
    {
        $parcelList1 = new ParcelList();
        $parcel1 = new Parcel('123', 'TypeA');
        $parcel2 = new Parcel('456', 'TypeB');

        $parcelList1->addParcel($parcel1);
        
        $parcelList2 = new ParcelList();
        $parcelList2->addParcel($parcel2);

        $parcelList1->addParcels($parcelList2);

        $this->assertSame($parcel1, $parcelList1->getFirstParcel());
        $this->assertSame($parcel1, $parcelList1->toArray()['123']);
        $this->assertSame($parcel2, $parcelList1->toArray()['456']);
    }

    public function testFromApiData()
    {
        $data = [
            ['packageId' => '123', 'packageType' => 'TypeA'],
            ['packageId' => '456', 'packageType' => 'TypeB'],
        ];

        $parcelList = ParcelList::fromApiData($data);

        $this->assertSame(2, $parcelList->count());
        $this->assertSame('TypeA', $parcelList->getFirstParcel()->getPackageType());
    }

    public function testFromIdVector()
    {
        $idVector = ['123', '456'];
        $packageType = 'TypeA';

        $parcelList = ParcelList::fromIdVector($idVector, $packageType);

        $this->assertSame(2, $parcelList->count());
        foreach ($parcelList->toArray() as $parcel) {
            $this->assertSame($packageType, $parcel->getPackageType());
        }
    }

    public function testGetFirstParcel()
    {
        $parcelList = new ParcelList();
        $parcel = new Parcel('123', 'TypeA');

        $parcelList->addParcel($parcel);

        $this->assertSame($parcel, $parcelList->getFirstParcel());
    }

    public function testCount()
    {
        $parcelList = new ParcelList();
        $this->assertSame(0, $parcelList->count());

        $parcel = new Parcel('123', 'TypeA');
        $parcelList->addParcel($parcel);

        $this->assertSame(1, $parcelList->count());
    }

    public function testCountParcelsByType()
    {
        $parcelList = new ParcelList();
        $parcel1 = new Parcel('123', 'TypeA');
        $parcel2 = new Parcel('456', 'TypeB');
        $parcel3 = new Parcel('789', 'TypeA');

        $parcelList->addParcel($parcel1);
        $parcelList->addParcel($parcel2);
        $parcelList->addParcel($parcel3);

        $this->assertEquals(2, $parcelList->countParcelsByType('TypeA'));
        $this->assertEquals(1, $parcelList->countParcelsByType('TypeB'));
    }
}
