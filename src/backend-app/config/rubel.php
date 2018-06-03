<?php

return [
    'host' => [
        'domain' => env('DOMAIN', 'rubel'),
        'admin_domain' => env('ADMIN_DOMAIN', 'admin.rubel'),
        'api_domain' => env('API_DOMAIN', 'api.rubel'),
    ],
    'admin' => [
        'name' => env('ADMIN_NAME', 'admin'),
        'email' => env('ADMIN_EMAIL', 'admin@example.com'),
        'password' => env('ADMIN_PASSWORD', 'password'),
    ],
];
