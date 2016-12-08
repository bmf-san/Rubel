<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Application Name
    |--------------------------------------------------------------------------
    */

    'name' => 'Laravel',

    /*
    |--------------------------------------------------------------------------
    | Application Environment
    |--------------------------------------------------------------------------
    */

    'env' => env('APP_ENV', 'production'),

    /*
    |--------------------------------------------------------------------------
    | Application Debug Mode
    |--------------------------------------------------------------------------
    */

    'debug' => env('APP_DEBUG', false),

    /*
    |--------------------------------------------------------------------------
    | Application URL
    |--------------------------------------------------------------------------
    */

    'url' => env('APP_URL', 'http://localhost'),

    /*
    |--------------------------------------------------------------------------
    | Application Timezone
    |--------------------------------------------------------------------------
    */

    'timezone' => 'UTC',

    /*
    |--------------------------------------------------------------------------
    | Application Locale Configuration
    |--------------------------------------------------------------------------
    */

    'locale' => 'en',

    /*
    |--------------------------------------------------------------------------
    | Application Fallback Locale
    |--------------------------------------------------------------------------
    */

    'fallback_locale' => 'en',

    /*
    |--------------------------------------------------------------------------
    | Encryption Key
    |--------------------------------------------------------------------------
    */

    'key' => env('APP_KEY'),

    'cipher' => 'AES-256-CBC',

    /*
    |--------------------------------------------------------------------------
    | Logging Configuration
    |--------------------------------------------------------------------------
    */

    'log' => env('APP_LOG', 'single'),

    'log_level' => env('APP_LOG_LEVEL', 'debug'),

    /*
    |--------------------------------------------------------------------------
    | Autoloaded Service Providers
    |--------------------------------------------------------------------------
    */

    'providers' => [

        /*
         * Laravel Framework Service Providers...
         */
        Illuminate\Auth\AuthServiceProvider::class,
        Illuminate\Broadcasting\BroadcastServiceProvider::class,
        Illuminate\Bus\BusServiceProvider::class,
        Illuminate\Cache\CacheServiceProvider::class,
        Illuminate\Foundation\Providers\ConsoleSupportServiceProvider::class,
        Illuminate\Cookie\CookieServiceProvider::class,
        Illuminate\Database\DatabaseServiceProvider::class,
        Illuminate\Encryption\EncryptionServiceProvider::class,
        Illuminate\Filesystem\FilesystemServiceProvider::class,
        Illuminate\Foundation\Providers\FoundationServiceProvider::class,
        Illuminate\Hashing\HashServiceProvider::class,
        Illuminate\Mail\MailServiceProvider::class,
        Illuminate\Notifications\NotificationServiceProvider::class,
        Illuminate\Pagination\PaginationServiceProvider::class,
        Illuminate\Pipeline\PipelineServiceProvider::class,
        Illuminate\Queue\QueueServiceProvider::class,
        Illuminate\Redis\RedisServiceProvider::class,
        Illuminate\Auth\Passwords\PasswordResetServiceProvider::class,
        Illuminate\Session\SessionServiceProvider::class,
        Illuminate\Translation\TranslationServiceProvider::class,
        Illuminate\Validation\ValidationServiceProvider::class,
        Illuminate\View\ViewServiceProvider::class,

        /*
         * Package Service Providers...
         */

        //

        /*
         * Application Service Providers...
         */
        App\Providers\AppServiceProvider::class,
        App\Providers\AuthServiceProvider::class,
        // App\Providers\BroadcastServiceProvider::class,
        App\Providers\EventServiceProvider::class,
        App\Providers\RouteServiceProvider::class,

    ],

    /*
    |--------------------------------------------------------------------------
    | Class Aliases
    |--------------------------------------------------------------------------
    */

    'aliases' => [

        // 'App' => Illuminate\Support\Facades\App::class,
        // 'Artisan' => Illuminate\Support\Facades\Artisan::class,
        // 'Auth' => Illuminate\Support\Facades\Auth::class,
        // 'Blade' => Illuminate\Support\Facades\Blade::class,
        // 'Bus' => Illuminate\Support\Facades\Bus::class,
        // 'Cache' => Illuminate\Support\Facades\Cache::class,
        // 'Config' => Illuminate\Support\Facades\Config::class,
        // 'Cookie' => Illuminate\Support\Facades\Cookie::class,
        // 'Crypt' => Illuminate\Support\Facades\Crypt::class,
        // 'DB' => Illuminate\Support\Facades\DB::class,
        // 'Eloquent' => Illuminate\Database\Eloquent\Model::class,
        // 'Event' => Illuminate\Support\Facades\Event::class,
        // 'File' => Illuminate\Support\Facades\File::class,
        // 'Gate' => Illuminate\Support\Facades\Gate::class,
        // 'Hash' => Illuminate\Support\Facades\Hash::class,
        // 'Lang' => Illuminate\Support\Facades\Lang::class,
        // 'Log' => Illuminate\Support\Facades\Log::class,
        // 'Mail' => Illuminate\Support\Facades\Mail::class,
        // 'Notification' => Illuminate\Support\Facades\Notification::class,
        // 'Password' => Illuminate\Support\Facades\Password::class,
        // 'Queue' => Illuminate\Support\Facades\Queue::class,
        // 'Redirect' => Illuminate\Support\Facades\Redirect::class,
        // 'Redis' => Illuminate\Support\Facades\Redis::class,
        // 'Request' => Illuminate\Support\Facades\Request::class,
        // 'Response' => Illuminate\Support\Facades\Response::class,
        'Route' => Illuminate\Support\Facades\Route::class,
        // 'Schema' => Illuminate\Support\Facades\Schema::class,
        // 'Session' => Illuminate\Support\Facades\Session::class,
        // 'Storage' => Illuminate\Support\Facades\Storage::class,
        // 'URL' => Illuminate\Support\Facades\URL::class,
        // 'Validator' => Illuminate\Support\Facades\Validator::class,
        // 'View' => Illuminate\Support\Facades\View::class,

    ],

];
