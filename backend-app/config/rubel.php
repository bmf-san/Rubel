<?php

return [
    'host' => [
        'domain' => env('DOMAIN', 'rubel'),
        'admin_domain' => env('ADMIN_DOMAIN', 'admin.rubel'),
        'api_domain' => env('API_DOMAIN', 'api.rubel'),

    ],
    'admin' => [
        'name' => env('ADMIN_INFO_NAME', 'admin'),
        'email' => env('ADMIN_INFO_EMAIL', 'admin@admin.com'),
        'password' => env('ADMIN_INFO_password', 'admin'),
    ],
    'config' => [
        'title' => 'Rubel',
        'sub_title' => 'A Simple CMS worked by Laravel, React, and Bulma.',
    ]
];
