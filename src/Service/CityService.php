<?php

declare(strict_types=1);

namespace Talovskiy\SimpleGeoIp\Service;

use GeoIp2\Model\AbstractModel;
use Talovskiy\SimpleGeoIp\Dto\CityDto;

final class CityService extends AbstractService
{
    public const SERVICE_TYPE = 'city';

    /**
     * @throws \GeoIp2\Exception\AddressNotFoundException
     * @throws \MaxMind\Db\Reader\InvalidDatabaseException
     */
    protected function getGeoData(string $ip): AbstractModel
    {
        return $this->reader->city($ip);
    }

    /**
     * @param AbstractModel $model
     * @return CityDto
     */
    protected function getDto(AbstractModel $model): CityDto
    {
        return new CityDto(
            $model?->continent->name,
            $model?->country->name,
            $model?->mostSpecificSubdivision->name,
            $model?->city->name,
            $model?->raw,
        );
    }
}
