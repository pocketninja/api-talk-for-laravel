<?php

namespace PocketNinja\ApiTalk\Commands;

use Illuminate\Console\Command;

class ApiTalkCommand extends Command
{
    public $signature = 'api-talk-for-laravel';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
