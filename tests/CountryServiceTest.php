<?php

declare(strict_types=1);

namespace Talovskiy\SimpleGeoIp\Tests;

use GeoIp2\Database\Reader;
use PHPUnit\Framework\TestCase;
use Talovskiy\SimpleGeoIp\Service\CountryService;
use Talovskiy\SimpleGeoIp\Service\DatabaseReaderFactory;

class CountryServiceTest extends TestCase
{
    private Reader $reader;

    protected function setUp(): void
    {
        parent::setUp();

        $this->reader = (new DatabaseReaderFactory())->getReader(CountryService::SERVICE_TYPE);
    }

    public function testGetData(): void
    {
        $service = new CountryService($this->reader);
        $cityDto = $service->getData('213.87.224.239');

        $this->assertEquals('Europe', $cityDto->getContinent());
        $this->assertEquals('Russia', $cityDto->getCountry());
    }
}
