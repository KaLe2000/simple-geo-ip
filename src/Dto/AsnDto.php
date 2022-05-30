<?php

declare(strict_types=1);

namespace Talovskiy\SimpleGeoIp\Dto;

class AsnDto implements ServiceDtoInterface
{
    public function __construct(
        protected string $organization,
        protected array $raw
    ) {
    }

    /**
     * @return string
     */
    public function getOrganization(): string
    {
        return $this->organization;
    }

    /**
     * @return array
     */
    public function getRaw(): array
    {
        return $this->raw;
    }
}
