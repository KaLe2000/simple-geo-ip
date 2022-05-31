<?php

declare(strict_types=1);

namespace Talovskiy\SimpleGeoIp\Service;

use GeoIp2\Model\AbstractModel;
use Talovskiy\SimpleGeoIp\Dto\AsnDto;

final class AsnService extends AbstractService
{
    public const SERVICE_TYPE = 'asn';
    private const RESULT_UNDEFINED = 'Неопознана';

    /**
     * @throws \GeoIp2\Exception\AddressNotFoundException
     * @throws \MaxMind\Db\Reader\InvalidDatabaseException
     */
    protected function getGeoData(string $ip): AbstractModel
    {
        return $this->reader->asn($ip);
    }

    /**
     * @param AbstractModel|null $model
     * @return AsnDto
     */
    protected function getDto(?AbstractModel $model): AsnDto
    {
        return new AsnDto(
            $model?->autonomousSystemOrganization ?? self::RESULT_UNDEFINED,
            $model?->raw ?? [],
        );
    }
}
