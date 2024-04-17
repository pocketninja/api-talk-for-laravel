<?php

namespace PocketNinja\ApiTalk;

use PocketNinja\ApiTalk\Commands\ApiTalkCommand;
use PocketNinja\ApiTalk\Contracts\BuildsRequests as RequestBuilderContract;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class ApiTalkServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
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
        require_once __DIR__.'/helpers.php';
        $this->app->bind(RequestBuilderContract::class, RequestBuilder::class);
        $this->app->singleton(ApiTalk::class, ApiTalk::class);
    }
}
