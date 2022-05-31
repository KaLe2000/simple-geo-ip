<?php

declare(strict_types=1);

namespace Talovskiy\SimpleGeoIp\Service;

use GeoIp2\Model\AbstractModel;
use Talovskiy\SimpleGeoIp\Dto\CountryDto;

final class CountryService extends AbstractService
{
    public const SERVICE_TYPE = 'country';
    private const RESULT_UNDEFINED = 'Неопознана';

    protected function getGeoData(string $ip): AbstractModel
    {
        return $this->reader->country($ip);
    }

    /**
     * @param AbstractModel|null $model
     * @return CountryDto
     */
    protected function getDto(?AbstractModel $model): CountryDto
    {
        return new CountryDto(
            $model?->continent->name ?? self::RESULT_UNDEFINED,
            $model?->country->name ?? self::RESULT_UNDEFINED,
            $model?->raw ?? [],
        );
    }
}
