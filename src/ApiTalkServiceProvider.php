<?php

namespace PocketNinja\ApiTalk;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use PocketNinja\ApiTalk\Commands\ApiTalkCommand;

class ApiTalkServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('api-talk-for-laravel')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_api-talk-for-laravel_table')
            ->hasCommand(ApiTalkCommand::class);
    }
}
