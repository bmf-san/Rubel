<?php

return [
    'admin' => [
        'name' => env('ADMIN_INFO_NAME', 'admin'),
        'email' => env('ADMIN_INFO_EMAIL', 'admin@admin.com'),
        'password' => env('ADMIN_INFO_password', 'admin'),
    ],
    'config' => [
        'title' => 'Rubel',
        'sub_title' => 'A Simple CMS worked by Laravel, React, and Bulma.'
    ]
];
