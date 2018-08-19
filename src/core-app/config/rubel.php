<?php

return [
    'admin' => [
        'name' => env('ADMIN_NAME', 'admin'),
        'email' => env('ADMIN_EMAIL', 'admin@example.com'),
        'password' => env('ADMIN_PASSWORD', 'password'),
    ],
    'theme' => [
        'view' => env('THEME_VIEW', 'bmftech'),
    ],
];
