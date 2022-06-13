<?php

declare(strict_types=1);

namespace Talovskiy\SimpleGeoIp\Service;

use GeoIp2\Model\AbstractModel;
use Talovskiy\SimpleGeoIp\Dto\CountryDto;

final class CountryService extends AbstractService
{
    public const SERVICE_TYPE = 'country';

    protected function getGeoData(string $ip): AbstractModel
    {
        return $this->reader->country($ip);
    }

    /**
     * @param AbstractModel $model
     * @return CountryDto
     */
    protected function getDto(AbstractModel $model): CountryDto
    {
        return new CountryDto(
            $model?->continent->name,
            $model?->country->name,
            $model?->raw,
        );
    }
}
