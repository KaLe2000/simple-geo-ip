<?php

declare(strict_types=1);

namespace Talovskiy\SimpleGeoIp\Tests;

use GeoIp2\Database\Reader;
use PHPUnit\Framework\TestCase;
use Talovskiy\SimpleGeoIp\Service\CityService;
use Talovskiy\SimpleGeoIp\Service\DatabaseReaderFactory;

class CityServiceTest extends TestCase
{
    private Reader $reader;

    protected function setUp(): void
    {
        parent::setUp();

        $this->reader = (new DatabaseReaderFactory())->getReader(CityService::SERVICE_TYPE);
    }

    public function testGetData(): void
    {
        $service = new CityService($this->reader);
        $cityDto = $service->getData('45.129.255.99');

        $this->assertEquals('Kozuchow', $cityDto->getCity());
        $this->assertEquals('Poland', $cityDto->getCountry());
    }
}
