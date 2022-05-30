<?php

declare(strict_types=1);

namespace Talovskiy\SimpleGeoIp;

use Illuminate\Support\ServiceProvider;
use Talovskiy\SimpleGeoIp\Service\AsnService;
use Talovskiy\SimpleGeoIp\Service\CityService;
use Talovskiy\SimpleGeoIp\Service\CountryService;
use Talovskiy\SimpleGeoIp\Service\DatabaseReaderFactory;

class SimpleGeoIpServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../config/simple-geo-ip.php' => config_path('simple-geo-ip.php'),
        ]);
    }

    public function register()
    {
        $this->app->singleton(AsnService::class, function () {
            $reader = (new DatabaseReaderFactory())->getReader(AsnService::SERVICE_TYPE);

            return new AsnService($reader);
        });

        $this->app->singleton(CityService::class, function () {
            $reader = (new DatabaseReaderFactory())->getReader(CityService::SERVICE_TYPE);

            return new CityService($reader);
        });

        $this->app->singleton(CountryService::class, function () {
            $reader = (new DatabaseReaderFactory())->getReader(CountryService::SERVICE_TYPE);

            return new CountryService($reader);
        });
    }
}
