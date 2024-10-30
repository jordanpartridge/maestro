<?php

namespace JordanPartridge\Maestro;

use JordanPartridge\Maestro\Commands\MaestroCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class MaestroServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('maestro')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_maestro_table')
            ->hasCommand(MaestroCommand::class);
    }
}
