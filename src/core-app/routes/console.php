<?php

use Illuminate\Foundation\Inspiring;

/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
*/

$artisan = app(Illuminate\Contracts\Console\Kernel::class);

$artisan->command('inspire', function () {
    $this->comment(Inspiring::quote());
})->describe('Display an inspiring quote');
