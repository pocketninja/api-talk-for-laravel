<?php

namespace PocketNinja\ApiTalk;

use PocketNinja\ApiTalk\Commands\ApiTalkCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

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
            ->hasConfigFile('api-talk')
            ->hasViews()
            ->hasMigration('create_api-talk-for-laravel_table');
        //            ->hasCommand(ApiTalkCommand::class)
    }

    public function register()
    {
        parent::register();
        require __DIR__.'/helpers.php';
        $this->app->singleton(ApiTalk::class, ApiTalk::class);
    }
}
