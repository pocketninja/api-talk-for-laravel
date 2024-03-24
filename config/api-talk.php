<?php

return [
    'apis' => [
        'cat-facts' => [
            'url' => 'https://catfact.ninja',
            'driver' => \PocketNinja\ApiTalk\Clients\BasicClient::class,
        ],
        'bored-api' => [
            'url' => 'https://www.boredapi.com/api',
        ],
    ]
];
