<?php

declare(strict_types=1);

namespace Talovskiy\SimpleGeoIp\Dto;

class CountryDto implements ServiceDtoInterface
{
    public function __construct(
        protected string $continent,
        protected string $country,
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
     * @return array
     */
    public function getRaw(): array
    {
        return $this->raw;
    }
}
