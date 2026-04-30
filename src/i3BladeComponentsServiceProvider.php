<?php

namespace i3\i3BladeComponents;

use i3\i3BladeComponents\Components\UConnBanner;
use Illuminate\Support\Facades\Blade;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class i3BladeComponentsServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('blade-components')
            ->hasConfigFile()
            ->hasViews('i3')
            ->hasAssets();
    }

    public function bootingPackage(): void
    {
        Blade::component('i3::uconn-banner', UConnBanner::class);
    }
}
