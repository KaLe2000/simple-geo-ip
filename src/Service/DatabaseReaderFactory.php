<?php

declare(strict_types=1);

namespace Talovskiy\SimpleGeoIp\Service;

use GeoIp2\Database\Reader;
use MaxMind\Db\Reader\InvalidDatabaseException;
use Talovskiy\SimpleGeoIp\Exceptions\InvalidTypeException;

final class DatabaseReaderFactory
{
    public const AVAILABLE_SERVICE = [
        AsnService::SERVICE_TYPE,
        CityService::SERVICE_TYPE,
        CountryService::SERVICE_TYPE,
    ];

    /**
     * @throws InvalidTypeException|InvalidDatabaseException
     */
    public function getReader(string $type): Reader
    {
        if (!\in_array($type, self::AVAILABLE_SERVICE, true)) {
            throw new InvalidTypeException('unhandled database reader type');
        }

        return new Reader(\config('simple-geo-ip.' . $type . '.database'));
    }
}
