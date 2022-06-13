<?php

declare(strict_types=1);

namespace Talovskiy\SimpleGeoIp\Service;

use GeoIp2\Database\Reader;
use GeoIp2\Model\AbstractModel;
use Talovskiy\SimpleGeoIp\Dto\ServiceDtoInterface;

abstract class AbstractService implements ServiceInterface
{
    protected Reader $reader;

    public function __construct(Reader $reader)
    {
        $this->reader = $reader;
    }

    public function getData(string $ip): ?ServiceDtoInterface
    {
        try {
            return $this->getDto($this->getGeoData($ip));
        } catch (\Throwable $e) {
            // Если не удалось определить данные выводим заглушку
            return null;
        }
    }

    abstract protected function getGeoData(string $ip): AbstractModel;

    abstract protected function getDto(AbstractModel $model): ServiceDtoInterface;
}
