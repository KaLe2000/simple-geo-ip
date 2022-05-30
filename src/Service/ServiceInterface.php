<?php

declare(strict_types=1);

namespace Talovskiy\SimpleGeoIp\Service;

use Talovskiy\SimpleGeoIp\Dto\ServiceDtoInterface;

interface ServiceInterface
{
    public function getData(string $ip): ServiceDtoInterface;
}
