<?php

declare(strict_types=1);

namespace Talovskiy\SimpleGeoIp\Dto;

use Talovskiy\SimpleGeoIp\Service\AbstractService;

class CityDto implements ServiceDtoInterface
{
    public function __construct(
        protected string $continent,
        protected string $country,
        protected string $subdivision,
        protected string $city,
        protected array $raw
    ) {
    }

    /**
     * @return string
     */
    public function getContinent(): string
    {
        return $this->continent;
    }

    /**
     * @return string
     */
    public function getCountry(): string
    {
        return $this->country;
    }

    /**
     * @return string
     */
    public function getSubdivision(): string
    {
        return $this->subdivision;
    }

    /**
     * @param string|null $lang
     * @return string
     */
    public function getCity(?string $lang = AbstractService::LANG_RU): string
    {
        return $this->getRaw()['city']['names'][$lang] ?? $this->city;
    }

    /**
     * @return array
     */
    public function getRaw(): array
    {
        return $this->raw;
    }
}
