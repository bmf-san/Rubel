<?php
/**
 * A helper file for Laravel 5, to provide autocomplete information to your IDE
 * Generated for Laravel 5.4.27 on 2017-06-28.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 * @see https://github.com/barryvdh/laravel-ide-helper
 */
namespace  {
    exit("This file should not be included, only analyzed by your IDE");
}

namespace Illuminate\Support\Facades { 

    class Artisan {
        
        /**
         * Run the console application.
         *
         * @param \Symfony\Component\Console\Input\InputInterface $input
         * @param \Symfony\Component\Console\Output\OutputInterface $output
         * @return int 
         * @static 
         */ 
        public static function handle($input, $output = null)
        {
            //Method inherited from \Illuminate\Foundation\Console\Kernel            
            return \App\Console\Kernel::handle($input, $output);
        }
        
        /**
         * Terminate the application.
         *
         * @param \Symfony\Component\Console\Input\InputInterface $input
         * @param int $status
         * @return void 
         * @static 
         */ 
        public static function terminate($input, $status)
        {
            //Method inherited from \Illuminate\Foundation\Console\Kernel            
            \App\Console\Kernel::terminate($input, $status);
        }
        
        /**
         * Register a Closure based command with the application.
         *
         * @param string $signature
         * @param \Closure $callback
         * @return \Illuminate\Foundation\Console\ClosureCommand 
         * @static 
         */ 
        public static function command($signature, $callback)
        {
            //Method inherited from \Illuminate\Foundation\Console\Kernel            
            return \App\Console\Kernel::command($signature, $callback);
        }
        
        /**
         * Register the given command with the console application.
         *
         * @param \Symfony\Component\Console\Command\Command $command
         * @return void 
         * @static 
         */ 
        public static function registerCommand($command)
        {
            //Method inherited from \Illuminate\Foundation\Console\Kernel            
            \App\Console\Kernel::registerCommand($command);
        }
        
        /**
         * Run an Artisan console command by name.
         *
         * @param string $command
         * @param array $parameters
         * @param \Symfony\Component\Console\Output\OutputInterface $outputBuffer
         * @return int 
         * @static 
         */ 
        public static function call($command, $parameters = array(), $outputBuffer = null)
        {
            //Method inherited from \Illuminate\Foundation\Console\Kernel            
            return \App\Console\Kernel::call($command, $parameters, $outputBuffer);
        }
        
        /**
         * Queue the given console command.
         *
         * @param string $command
         * @param array $parameters
         * @return \Illuminate\Foundation\Bus\PendingDispatch 
         * @static 
         */ 
        public static function queue($command, $parameters = array())
        {
            //Method inherited from \Illuminate\Foundation\Console\Kernel            
            return \App\Console\Kernel::queue($command, $parameters);
        }
        
        /**
         * Get all of the commands registered with the console.
         *
         * @return array 
         * @static 
         */ 
        public static function all()
        {
            //Method inherited from \Illuminate\Foundation\Console\Kernel            
            return \App\Console\Kernel::all();
        }
        
        /**
         * Get the output for the last run command.
         *
         * @return string 
         * @static 
         */ 
        public static function output()
        {
            //Method inherited from \Illuminate\Foundation\Console\Kernel            
            return \App\Console\Kernel::output();
        }
        
        /**
         * Bootstrap the application for artisan commands.
         *
         * @return void 
         * @static 
         */ 
        public static function bootstrap()
        {
            //Method inherited from \Illuminate\Foundation\Console\Kernel            
            \App\Console\Kernel::bootstrap();
        }
        
        /**
         * Set the Artisan application instance.
         *
         * @param \Illuminate\Console\Application $artisan
         * @return void 
         * @static 
         */ 
        public static function setArtisan($artisan)
        {
            //Method inherited from \Illuminate\Foundation\Console\Kernel            
            \App\Console\Kernel::setArtisan($artisan);
        }
         
    }

    class Auth {
        
        /**
         * Attempt to get the guard from the local cache.
         *
         * @param string $name
         * @return \Illuminate\Contracts\Auth\Guard|\Illuminate\Contracts\Auth\StatefulGuard 
         * @static 
         */ 
        public static function guard($name = null)
        {
            return \Illuminate\Auth\AuthManager::guard($name);
        }
        
        /**
         * Create a session based authentication guard.
         *
         * @param string $name
         * @param array $config
         * @return \Illuminate\Auth\SessionGuard 
         * @static 
         */ 
        public static function createSessionDriver($name, $config)
        {
            return \Illuminate\Auth\AuthManager::createSessionDriver($name, $config);
        }
        
        /**
         * Create a token based authentication guard.
         *
         * @param string $name
         * @param array $config
         * @return \Illuminate\Auth\TokenGuard 
         * @static 
         */ 
        public static function createTokenDriver($name, $config)
        {
            return \Illuminate\Auth\AuthManager::createTokenDriver($name, $config);
        }
        
        /**
         * Get the default authentication driver name.
         *
         * @return string 
         * @static 
         */ 
        public static function getDefaultDriver()
        {
            return \Illuminate\Auth\AuthManager::getDefaultDriver();
        }
        
        /**
         * Set the default guard driver the factory should serve.
         *
         * @param string $name
         * @return void 
         * @static 
         */ 
        public static function shouldUse($name)
        {
            \Illuminate\Auth\AuthManager::shouldUse($name);
        }
        
        /**
         * Set the default authentication driver name.
         *
         * @param string $name
         * @return void 
         * @static 
         */ 
        public static function setDefaultDriver($name)
        {
            \Illuminate\Auth\AuthManager::setDefaultDriver($name);
        }
        
        /**
         * Register a new callback based request guard.
         *
         * @param string $driver
         * @param callable $callback
         * @return $this 
         * @static 
         */ 
        public static function viaRequest($driver, $callback)
        {
            return \Illuminate\Auth\AuthManager::viaRequest($driver, $callback);
        }
        
        /**
         * Get the user resolver callback.
         *
         * @return \Closure 
         * @static 
         */ 
        public static function userResolver()
        {
            return \Illuminate\Auth\AuthManager::userResolver();
        }
        
        /**
         * Set the callback to be used to resolve users.
         *
         * @param \Closure $userResolver
         * @return $this 
         * @static 
         */ 
        public static function resolveUsersUsing($userResolver)
        {
            return \Illuminate\Auth\AuthManager::resolveUsersUsing($userResolver);
        }
        
        /**
         * Register a custom driver creator Closure.
         *
         * @param string $driver
         * @param \Closure $callback
         * @return $this 
         * @static 
         */ 
        public static function extend($driver, $callback)
        {
            return \Illuminate\Auth\AuthManager::extend($driver, $callback);
        }
        
        /**
         * Register a custom provider creator Closure.
         *
         * @param string $name
         * @param \Closure $callback
         * @return $this 
         * @static 
         */ 
        public static function provider($name, $callback)
        {
            return \Illuminate\Auth\AuthManager::provider($name, $callback);
        }
        
        /**
         * Create the user provider implementation for the driver.
         *
         * @param string $provider
         * @return \Illuminate\Contracts\Auth\UserProvider 
         * @throws \InvalidArgumentException
         * @static 
         */ 
        public static function createUserProvider($provider)
        {
            return \Illuminate\Auth\AuthManager::createUserProvider($provider);
        }
        
        /**
         * Get the currently authenticated user.
         *
         * @return \App\User|null 
         * @static 
         */ 
        public static function user()
        {
            return \Illuminate\Auth\SessionGuard::user();
        }
        
        /**
         * Get the ID for the currently authenticated user.
         *
         * @return int|null 
         * @static 
         */ 
        public static function id()
        {
            return \Illuminate\Auth\SessionGuard::id();
        }
        
        /**
         * Log a user into the application without sessions or cookies.
         *
         * @param array $credentials
         * @return bool 
         * @static 
         */ 
        public static function once($credentials = array())
        {
            return \Illuminate\Auth\SessionGuard::once($credentials);
        }
        
        /**
         * Log the given user ID into the application without sessions or cookies.
         *
         * @param mixed $id
         * @return \App\User|false 
         * @static 
         */ 
        public static function onceUsingId($id)
        {
            return \Illuminate\Auth\SessionGuard::onceUsingId($id);
        }
        
        /**
         * Validate a user's credentials.
         *
         * @param array $credentials
         * @return bool 
         * @static 
         */ 
        public static function validate($credentials = array())
        {
            return \Illuminate\Auth\SessionGuard::validate($credentials);
        }
        
        /**
         * Attempt to authenticate using HTTP Basic Auth.
         *
         * @param string $field
         * @param array $extraConditions
         * @return \Symfony\Component\HttpFoundation\Response|null 
         * @static 
         */ 
        public static function basic($field = 'email', $extraConditions = array())
        {
            return \Illuminate\Auth\SessionGuard::basic($field, $extraConditions);
        }
        
        /**
         * Perform a stateless HTTP Basic login attempt.
         *
         * @param string $field
         * @param array $extraConditions
         * @return \Symfony\Component\HttpFoundation\Response|null 
         * @static 
         */ 
        public static function onceBasic($field = 'email', $extraConditions = array())
        {
            return \Illuminate\Auth\SessionGuard::onceBasic($field, $extraConditions);
        }
        
        /**
         * Attempt to authenticate a user using the given credentials.
         *
         * @param array $credentials
         * @param bool $remember
         * @return bool 
         * @static 
         */ 
        public static function attempt($credentials = array(), $remember = false)
        {
            return \Illuminate\Auth\SessionGuard::attempt($credentials, $remember);
        }
        
        /**
         * Log the given user ID into the application.
         *
         * @param mixed $id
         * @param bool $remember
         * @return \App\User|false 
         * @static 
         */ 
        public static function loginUsingId($id, $remember = false)
        {
            return \Illuminate\Auth\SessionGuard::loginUsingId($id, $remember);
        }
        
        /**
         * Log a user into the application.
         *
         * @param \Illuminate\Contracts\Auth\Authenticatable $user
         * @param bool $remember
         * @return void 
         * @static 
         */ 
        public static function login($user, $remember = false)
        {
            \Illuminate\Auth\SessionGuard::login($user, $remember);
        }
        
        /**
         * Log the user out of the application.
         *
         * @return void 
         * @static 
         */ 
        public static function logout()
        {
            \Illuminate\Auth\SessionGuard::logout();
        }
        
        /**
         * Register an authentication attempt event listener.
         *
         * @param mixed $callback
         * @return void 
         * @static 
         */ 
        public static function attempting($callback)
        {
            \Illuminate\Auth\SessionGuard::attempting($callback);
        }
        
        /**
         * Get the last user we attempted to authenticate.
         *
         * @return \App\User 
         * @static 
         */ 
        public static function getLastAttempted()
        {
            return \Illuminate\Auth\SessionGuard::getLastAttempted();
        }
        
        /**
         * Get a unique identifier for the auth session value.
         *
         * @return string 
         * @static 
         */ 
        public static function getName()
        {
            return \Illuminate\Auth\SessionGuard::getName();
        }
        
        /**
         * Get the name of the cookie used to store the "recaller".
         *
         * @return string 
         * @static 
         */ 
        public static function getRecallerName()
        {
            return \Illuminate\Auth\SessionGuard::getRecallerName();
        }
        
        /**
         * Determine if the user was authenticated via "remember me" cookie.
         *
         * @return bool 
         * @static 
         */ 
        public static function viaRemember()
        {
            return \Illuminate\Auth\SessionGuard::viaRemember();
        }
        
        /**
         * Get the cookie creator instance used by the guard.
         *
         * @return \Illuminate\Contracts\Cookie\QueueingFactory 
         * @throws \RuntimeException
         * @static 
         */ 
        public static function getCookieJar()
        {
            return \Illuminate\Auth\SessionGuard::getCookieJar();
        }
        
        /**
         * Set the cookie creator instance used by the guard.
         *
         * @param \Illuminate\Contracts\Cookie\QueueingFactory $cookie
         * @return void 
         * @static 
         */ 
        public static function setCookieJar($cookie)
        {
            \Illuminate\Auth\SessionGuard::setCookieJar($cookie);
        }
        
        /**
         * Get the event dispatcher instance.
         *
         * @return \Illuminate\Contracts\Events\Dispatcher 
         * @static 
         */ 
        public static function getDispatcher()
        {
            return \Illuminate\Auth\SessionGuard::getDispatcher();
        }
        
        /**
         * Set the event dispatcher instance.
         *
         * @param \Illuminate\Contracts\Events\Dispatcher $events
         * @return void 
         * @static 
         */ 
        public static function setDispatcher($events)
        {
            \Illuminate\Auth\SessionGuard::setDispatcher($events);
        }
        
        /**
         * Get the session store used by the guard.
         *
         * @return \Illuminate\Session\Store 
         * @static 
         */ 
        public static function getSession()
        {
            return \Illuminate\Auth\SessionGuard::getSession();
        }
        
        /**
         * Get the user provider used by the guard.
         *
         * @return \Illuminate\Contracts\Auth\UserProvider 
         * @static 
         */ 
        public static function getProvider()
        {
            return \Illuminate\Auth\SessionGuard::getProvider();
        }
        
        /**
         * Set the user provider used by the guard.
         *
         * @param \Illuminate\Contracts\Auth\UserProvider $provider
         * @return void 
         * @static 
         */ 
        public static function setProvider($provider)
        {
            \Illuminate\Auth\SessionGuard::setProvider($provider);
        }
        
        /**
         * Return the currently cached user.
         *
         * @return \App\User|null 
         * @static 
         */ 
        public static function getUser()
        {
            return \Illuminate\Auth\SessionGuard::getUser();
        }
        
        /**
         * Set the current user.
         *
         * @param \Illuminate\Contracts\Auth\Authenticatable $user
         * @return $this 
         * @static 
         */ 
        public static function setUser($user)
        {
            return \Illuminate\Auth\SessionGuard::setUser($user);
        }
        
        /**
         * Get the current request instance.
         *
         * @return \Symfony\Component\HttpFoundation\Request 
         * @static 
         */ 
        public static function getRequest()
        {
            return \Illuminate\Auth\SessionGuard::getRequest();
        }
        
        /**
         * Set the current request instance.
         *
         * @param \Symfony\Component\HttpFoundation\Request $request
         * @return $this 
         * @static 
         */ 
        public static function setRequest($request)
        {
            return \Illuminate\Auth\SessionGuard::setRequest($request);
        }
        
        /**
         * Determine if the current user is authenticated.
         *
         * @return \App\User 
         * @throws \Illuminate\Auth\AuthenticationException
         * @static 
         */ 
        public static function authenticate()
        {
            return \Illuminate\Auth\SessionGuard::authenticate();
        }
        
        /**
         * Determine if the current user is authenticated.
         *
         * @return bool 
         * @static 
         */ 
        public static function check()
        {
            return \Illuminate\Auth\SessionGuard::check();
        }
        
        /**
         * Determine if the current user is a guest.
         *
         * @return bool 
         * @static 
         */ 
        public static function guest()
        {
            return \Illuminate\Auth\SessionGuard::guest();
        }
        
        /**
         * Register a custom macro.
         *
         * @param string $name
         * @param callable $macro
         * @return void 
         * @static 
         */ 
        public static function macro($name, $macro)
        {
            \Illuminate\Auth\SessionGuard::macro($name, $macro);
        }
        
        /**
         * Checks if macro is registered.
         *
         * @param string $name
         * @return bool 
         * @static 
         */ 
        public static function hasMacro($name)
        {
            return \Illuminate\Auth\SessionGuard::hasMacro($name);
        }
         
    }

    class Schema {
        
        /**
         * Determine if the given table exists.
         *
         * @param string $table
         * @return bool 
         * @static 
         */ 
        public static function hasTable($table)
        {
            return \Illuminate\Database\Schema\MySqlBuilder::hasTable($table);
        }
        
        /**
         * Get the column listing for a given table.
         *
         * @param string $table
         * @return array 
         * @static 
         */ 
        public static function getColumnListing($table)
        {
            return \Illuminate\Database\Schema\MySqlBuilder::getColumnListing($table);
        }
        
        /**
         * Set the default string length for migrations.
         *
         * @param int $length
         * @return void 
         * @static 
         */ 
        public static function defaultStringLength($length)
        {
            //Method inherited from \Illuminate\Database\Schema\Builder            
            \Illuminate\Database\Schema\MySqlBuilder::defaultStringLength($length);
        }
        
        /**
         * Determine if the given table has a given column.
         *
         * @param string $table
         * @param string $column
         * @return bool 
         * @static 
         */ 
        public static function hasColumn($table, $column)
        {
            //Method inherited from \Illuminate\Database\Schema\Builder            
            return \Illuminate\Database\Schema\MySqlBuilder::hasColumn($table, $column);
        }
        
        /**
         * Determine if the given table has given columns.
         *
         * @param string $table
         * @param array $columns
         * @return bool 
         * @static 
         */ 
        public static function hasColumns($table, $columns)
        {
            //Method inherited from \Illuminate\Database\Schema\Builder            
            return \Illuminate\Database\Schema\MySqlBuilder::hasColumns($table, $columns);
        }
        
        /**
         * Get the data type for the given column name.
         *
         * @param string $table
         * @param string $column
         * @return string 
         * @static 
         */ 
        public static function getColumnType($table, $column)
        {
            //Method inherited from \Illuminate\Database\Schema\Builder            
            return \Illuminate\Database\Schema\MySqlBuilder::getColumnType($table, $column);
        }
        
        /**
         * Modify a table on the schema.
         *
         * @param string $table
         * @param \Closure $callback
         * @return void 
         * @static 
         */ 
        public static function table($table, $callback)
        {
            //Method inherited from \Illuminate\Database\Schema\Builder            
            \Illuminate\Database\Schema\MySqlBuilder::table($table, $callback);
        }
        
        /**
         * Create a new table on the schema.
         *
         * @param string $table
         * @param \Closure $callback
         * @return void 
         * @static 
         */ 
        public static function create($table, $callback)
        {
            //Method inherited from \Illuminate\Database\Schema\Builder            
            \Illuminate\Database\Schema\MySqlBuilder::create($table, $callback);
        }
        
        /**
         * Drop a table from the schema.
         *
         * @param string $table
         * @return void 
         * @static 
         */ 
        public static function drop($table)
        {
            //Method inherited from \Illuminate\Database\Schema\Builder            
            \Illuminate\Database\Schema\MySqlBuilder::drop($table);
        }
        
        /**
         * Drop a table from the schema if it exists.
         *
         * @param string $table
         * @return void 
         * @static 
         */ 
        public static function dropIfExists($table)
        {
            //Method inherited from \Illuminate\Database\Schema\Builder            
            \Illuminate\Database\Schema\MySqlBuilder::dropIfExists($table);
        }
        
        /**
         * Rename a table on the schema.
         *
         * @param string $from
         * @param string $to
         * @return void 
         * @static 
         */ 
        public static function rename($from, $to)
        {
            //Method inherited from \Illuminate\Database\Schema\Builder            
            \Illuminate\Database\Schema\MySqlBuilder::rename($from, $to);
        }
        
        /**
         * Enable foreign key constraints.
         *
         * @return bool 
         * @static 
         */ 
        public static function enableForeignKeyConstraints()
        {
            //Method inherited from \Illuminate\Database\Schema\Builder            
            return \Illuminate\Database\Schema\MySqlBuilder::enableForeignKeyConstraints();
        }
        
        /**
         * Disable foreign key constraints.
         *
         * @return bool 
         * @static 
         */ 
        public static function disableForeignKeyConstraints()
        {
            //Method inherited from \Illuminate\Database\Schema\Builder            
            return \Illuminate\Database\Schema\MySqlBuilder::disableForeignKeyConstraints();
        }
        
        /**
         * Get the database connection instance.
         *
         * @return \Illuminate\Database\Connection 
         * @static 
         */ 
        public static function getConnection()
        {
            //Method inherited from \Illuminate\Database\Schema\Builder            
            return \Illuminate\Database\Schema\MySqlBuilder::getConnection();
        }
        
        /**
         * Set the database connection instance.
         *
         * @param \Illuminate\Database\Connection $connection
         * @return $this 
         * @static 
         */ 
        public static function setConnection($connection)
        {
            //Method inherited from \Illuminate\Database\Schema\Builder            
            return \Illuminate\Database\Schema\MySqlBuilder::setConnection($connection);
        }
        
        /**
         * Set the Schema Blueprint resolver callback.
         *
         * @param \Closure $resolver
         * @return void 
         * @static 
         */ 
        public static function blueprintResolver($resolver)
        {
            //Method inherited from \Illuminate\Database\Schema\Builder            
            \Illuminate\Database\Schema\MySqlBuilder::blueprintResolver($resolver);
        }
         
    }
 
}

namespace Tymon\JWTAuth\Facades { 

    class JWTAuth {
        
        /**
         * Find a user using the user identifier in the subject claim.
         *
         * @param bool|string $token
         * @return mixed 
         * @static 
         */ 
        public static function toUser($token = false)
        {
            return \Tymon\JWTAuth\JWTAuth::toUser($token);
        }
        
        /**
         * Generate a token using the user identifier as the subject claim.
         *
         * @param mixed $user
         * @param array $customClaims
         * @return string 
         * @static 
         */ 
        public static function fromUser($user, $customClaims = array())
        {
            return \Tymon\JWTAuth\JWTAuth::fromUser($user, $customClaims);
        }
        
        /**
         * Attempt to authenticate the user and return the token.
         *
         * @param array $credentials
         * @param array $customClaims
         * @return false|string 
         * @static 
         */ 
        public static function attempt($credentials = array(), $customClaims = array())
        {
            return \Tymon\JWTAuth\JWTAuth::attempt($credentials, $customClaims);
        }
        
        /**
         * Authenticate a user via a token.
         *
         * @param mixed $token
         * @return mixed 
         * @static 
         */ 
        public static function authenticate($token = false)
        {
            return \Tymon\JWTAuth\JWTAuth::authenticate($token);
        }
        
        /**
         * Refresh an expired token.
         *
         * @param mixed $token
         * @return string 
         * @static 
         */ 
        public static function refresh($token = false)
        {
            return \Tymon\JWTAuth\JWTAuth::refresh($token);
        }
        
        /**
         * Invalidate a token (add it to the blacklist).
         *
         * @param mixed $token
         * @return bool 
         * @static 
         */ 
        public static function invalidate($token = false)
        {
            return \Tymon\JWTAuth\JWTAuth::invalidate($token);
        }
        
        /**
         * Get the token.
         *
         * @return bool|string 
         * @static 
         */ 
        public static function getToken()
        {
            return \Tymon\JWTAuth\JWTAuth::getToken();
        }
        
        /**
         * Get the raw Payload instance.
         *
         * @param mixed $token
         * @return \Tymon\JWTAuth\Payload 
         * @static 
         */ 
        public static function getPayload($token = false)
        {
            return \Tymon\JWTAuth\JWTAuth::getPayload($token);
        }
        
        /**
         * Parse the token from the request.
         *
         * @param string $query
         * @return \JWTAuth 
         * @static 
         */ 
        public static function parseToken($method = 'bearer', $header = 'authorization', $query = 'token')
        {
            return \Tymon\JWTAuth\JWTAuth::parseToken($method, $header, $query);
        }
        
        /**
         * Set the identifier.
         *
         * @param string $identifier
         * @return $this 
         * @static 
         */ 
        public static function setIdentifier($identifier)
        {
            return \Tymon\JWTAuth\JWTAuth::setIdentifier($identifier);
        }
        
        /**
         * Get the identifier.
         *
         * @return string 
         * @static 
         */ 
        public static function getIdentifier()
        {
            return \Tymon\JWTAuth\JWTAuth::getIdentifier();
        }
        
        /**
         * Set the token.
         *
         * @param string $token
         * @return $this 
         * @static 
         */ 
        public static function setToken($token)
        {
            return \Tymon\JWTAuth\JWTAuth::setToken($token);
        }
        
        /**
         * Set the request instance.
         *
         * @param \Tymon\JWTAuth\Request $request
         * @static 
         */ 
        public static function setRequest($request)
        {
            return \Tymon\JWTAuth\JWTAuth::setRequest($request);
        }
        
        /**
         * Get the JWTManager instance.
         *
         * @return \Tymon\JWTAuth\JWTManager 
         * @static 
         */ 
        public static function manager()
        {
            return \Tymon\JWTAuth\JWTAuth::manager();
        }
         
    }

    class JWTFactory {
        
        /**
         * Create the Payload instance.
         *
         * @param array $customClaims
         * @return \Tymon\JWTAuth\Payload 
         * @static 
         */ 
        public static function make($customClaims = array())
        {
            return \Tymon\JWTAuth\PayloadFactory::make($customClaims);
        }
        
        /**
         * Add an array of claims to the Payload.
         *
         * @param array $claims
         * @return $this 
         * @static 
         */ 
        public static function addClaims($claims)
        {
            return \Tymon\JWTAuth\PayloadFactory::addClaims($claims);
        }
        
        /**
         * Add a claim to the Payload.
         *
         * @param string $name
         * @param mixed $value
         * @return $this 
         * @static 
         */ 
        public static function addClaim($name, $value)
        {
            return \Tymon\JWTAuth\PayloadFactory::addClaim($name, $value);
        }
        
        /**
         * Build out the Claim DTO's.
         *
         * @return array 
         * @static 
         */ 
        public static function resolveClaims()
        {
            return \Tymon\JWTAuth\PayloadFactory::resolveClaims();
        }
        
        /**
         * Set the Issuer (iss) claim.
         *
         * @return string 
         * @static 
         */ 
        public static function iss()
        {
            return \Tymon\JWTAuth\PayloadFactory::iss();
        }
        
        /**
         * Set the Issued At (iat) claim.
         *
         * @return int 
         * @static 
         */ 
        public static function iat()
        {
            return \Tymon\JWTAuth\PayloadFactory::iat();
        }
        
        /**
         * Set the Expiration (exp) claim.
         *
         * @return int 
         * @static 
         */ 
        public static function exp()
        {
            return \Tymon\JWTAuth\PayloadFactory::exp();
        }
        
        /**
         * Set the Not Before (nbf) claim.
         *
         * @return int 
         * @static 
         */ 
        public static function nbf()
        {
            return \Tymon\JWTAuth\PayloadFactory::nbf();
        }
        
        /**
         * Set the token ttl (in minutes).
         *
         * @param int $ttl
         * @return $this 
         * @static 
         */ 
        public static function setTTL($ttl)
        {
            return \Tymon\JWTAuth\PayloadFactory::setTTL($ttl);
        }
        
        /**
         * Get the token ttl.
         *
         * @return int 
         * @static 
         */ 
        public static function getTTL()
        {
            return \Tymon\JWTAuth\PayloadFactory::getTTL();
        }
        
        /**
         * Set the refresh flow.
         *
         * @param bool $refreshFlow
         * @return $this 
         * @static 
         */ 
        public static function setRefreshFlow($refreshFlow = true)
        {
            return \Tymon\JWTAuth\PayloadFactory::setRefreshFlow($refreshFlow);
        }
         
    }
 
}


namespace  { 

    class Artisan extends \Illuminate\Support\Facades\Artisan {}

    class Auth extends \Illuminate\Support\Facades\Auth {}

    class Eloquent extends \Illuminate\Database\Eloquent\Model {         
            /**
             * Create and return an un-saved model instance.
             *
             * @param array $attributes
             * @return \Illuminate\Database\Eloquent\Model 
             * @static 
             */ 
            public static function make($attributes = array())
            {    
                return \Illuminate\Database\Eloquent\Builder::make($attributes);
            }
         
            /**
             * Register a new global scope.
             *
             * @param string $identifier
             * @param \Illuminate\Database\Eloquent\Scope|\Closure $scope
             * @return $this 
             * @static 
             */ 
            public static function withGlobalScope($identifier, $scope)
            {    
                return \Illuminate\Database\Eloquent\Builder::withGlobalScope($identifier, $scope);
            }
         
            /**
             * Remove a registered global scope.
             *
             * @param \Illuminate\Database\Eloquent\Scope|string $scope
             * @return $this 
             * @static 
             */ 
            public static function withoutGlobalScope($scope)
            {    
                return \Illuminate\Database\Eloquent\Builder::withoutGlobalScope($scope);
            }
         
            /**
             * Remove all or passed registered global scopes.
             *
             * @param array|null $scopes
             * @return $this 
             * @static 
             */ 
            public static function withoutGlobalScopes($scopes = null)
            {    
                return \Illuminate\Database\Eloquent\Builder::withoutGlobalScopes($scopes);
            }
         
            /**
             * Get an array of global scopes that were removed from the query.
             *
             * @return array 
             * @static 
             */ 
            public static function removedScopes()
            {    
                return \Illuminate\Database\Eloquent\Builder::removedScopes();
            }
         
            /**
             * Add a where clause on the primary key to the query.
             *
             * @param mixed $id
             * @return $this 
             * @static 
             */ 
            public static function whereKey($id)
            {    
                return \Illuminate\Database\Eloquent\Builder::whereKey($id);
            }
         
            /**
             * Add a basic where clause to the query.
             *
             * @param string|array|\Closure $column
             * @param string $operator
             * @param mixed $value
             * @param string $boolean
             * @return $this 
             * @static 
             */ 
            public static function where($column, $operator = null, $value = null, $boolean = 'and')
            {    
                return \Illuminate\Database\Eloquent\Builder::where($column, $operator, $value, $boolean);
            }
         
            /**
             * Add an "or where" clause to the query.
             *
             * @param string|\Closure $column
             * @param string $operator
             * @param mixed $value
             * @return \Illuminate\Database\Eloquent\Builder|static 
             * @static 
             */ 
            public static function orWhere($column, $operator = null, $value = null)
            {    
                return \Illuminate\Database\Eloquent\Builder::orWhere($column, $operator, $value);
            }
         
            /**
             * Create a collection of models from plain arrays.
             *
             * @param array $items
             * @return \Illuminate\Database\Eloquent\Collection 
             * @static 
             */ 
            public static function hydrate($items)
            {    
                return \Illuminate\Database\Eloquent\Builder::hydrate($items);
            }
         
            /**
             * Create a collection of models from a raw query.
             *
             * @param string $query
             * @param array $bindings
             * @return \Illuminate\Database\Eloquent\Collection 
             * @static 
             */ 
            public static function fromQuery($query, $bindings = array())
            {    
                return \Illuminate\Database\Eloquent\Builder::fromQuery($query, $bindings);
            }
         
            /**
             * Find a model by its primary key.
             *
             * @param mixed $id
             * @param array $columns
             * @return \Illuminate\Database\Eloquent\Model|\Illuminate\Database\Eloquent\Collection|static[]|static|null 
             * @static 
             */ 
            public static function find($id, $columns = array())
            {    
                return \Illuminate\Database\Eloquent\Builder::find($id, $columns);
            }
         
            /**
             * Find multiple models by their primary keys.
             *
             * @param array $ids
             * @param array $columns
             * @return \Illuminate\Database\Eloquent\Collection 
             * @static 
             */ 
            public static function findMany($ids, $columns = array())
            {    
                return \Illuminate\Database\Eloquent\Builder::findMany($ids, $columns);
            }
         
            /**
             * Find a model by its primary key or throw an exception.
             *
             * @param mixed $id
             * @param array $columns
             * @return \Illuminate\Database\Eloquent\Model|\Illuminate\Database\Eloquent\Collection 
             * @throws \Illuminate\Database\Eloquent\ModelNotFoundException
             * @static 
             */ 
            public static function findOrFail($id, $columns = array())
            {    
                return \Illuminate\Database\Eloquent\Builder::findOrFail($id, $columns);
            }
         
            /**
             * Find a model by its primary key or return fresh model instance.
             *
             * @param mixed $id
             * @param array $columns
             * @return \Illuminate\Database\Eloquent\Model 
             * @static 
             */ 
            public static function findOrNew($id, $columns = array())
            {    
                return \Illuminate\Database\Eloquent\Builder::findOrNew($id, $columns);
            }
         
            /**
             * Get the first record matching the attributes or instantiate it.
             *
             * @param array $attributes
             * @param array $values
             * @return \Illuminate\Database\Eloquent\Model 
             * @static 
             */ 
            public static function firstOrNew($attributes, $values = array())
            {    
                return \Illuminate\Database\Eloquent\Builder::firstOrNew($attributes, $values);
            }
         
            /**
             * Get the first record matching the attributes or create it.
             *
             * @param array $attributes
             * @param array $values
             * @return \Illuminate\Database\Eloquent\Model 
             * @static 
             */ 
            public static function firstOrCreate($attributes, $values = array())
            {    
                return \Illuminate\Database\Eloquent\Builder::firstOrCreate($attributes, $values);
            }
         
            /**
             * Create or update a record matching the attributes, and fill it with values.
             *
             * @param array $attributes
             * @param array $values
             * @return \Illuminate\Database\Eloquent\Model 
             * @static 
             */ 
            public static function updateOrCreate($attributes, $values = array())
            {    
                return \Illuminate\Database\Eloquent\Builder::updateOrCreate($attributes, $values);
            }
         
            /**
             * Execute the query and get the first result or throw an exception.
             *
             * @param array $columns
             * @return \Illuminate\Database\Eloquent\Model|static 
             * @throws \Illuminate\Database\Eloquent\ModelNotFoundException
             * @static 
             */ 
            public static function firstOrFail($columns = array())
            {    
                return \Illuminate\Database\Eloquent\Builder::firstOrFail($columns);
            }
         
            /**
             * Execute the query and get the first result or call a callback.
             *
             * @param \Closure|array $columns
             * @param \Closure|null $callback
             * @return \Illuminate\Database\Eloquent\Model|static|mixed 
             * @static 
             */ 
            public static function firstOr($columns = array(), $callback = null)
            {    
                return \Illuminate\Database\Eloquent\Builder::firstOr($columns, $callback);
            }
         
            /**
             * Get a single column's value from the first result of a query.
             *
             * @param string $column
             * @return mixed 
             * @static 
             */ 
            public static function value($column)
            {    
                return \Illuminate\Database\Eloquent\Builder::value($column);
            }
         
            /**
             * Execute the query as a "select" statement.
             *
             * @param array $columns
             * @return \Illuminate\Database\Eloquent\Collection|static[] 
             * @static 
             */ 
            public static function get($columns = array())
            {    
                return \Illuminate\Database\Eloquent\Builder::get($columns);
            }
         
            /**
             * Get the hydrated models without eager loading.
             *
             * @param array $columns
             * @return \Illuminate\Database\Eloquent\Model[] 
             * @static 
             */ 
            public static function getModels($columns = array())
            {    
                return \Illuminate\Database\Eloquent\Builder::getModels($columns);
            }
         
            /**
             * Eager load the relationships for the models.
             *
             * @param array $models
             * @return array 
             * @static 
             */ 
            public static function eagerLoadRelations($models)
            {    
                return \Illuminate\Database\Eloquent\Builder::eagerLoadRelations($models);
            }
         
            /**
             * Get a generator for the given query.
             *
             * @return \Generator 
             * @static 
             */ 
            public static function cursor()
            {    
                return \Illuminate\Database\Eloquent\Builder::cursor();
            }
         
            /**
             * Chunk the results of a query by comparing numeric IDs.
             *
             * @param int $count
             * @param callable $callback
             * @param string $column
             * @param string|null $alias
             * @return bool 
             * @static 
             */ 
            public static function chunkById($count, $callback, $column = null, $alias = null)
            {    
                return \Illuminate\Database\Eloquent\Builder::chunkById($count, $callback, $column, $alias);
            }
         
            /**
             * Get an array with the values of a given column.
             *
             * @param string $column
             * @param string|null $key
             * @return \Illuminate\Support\Collection 
             * @static 
             */ 
            public static function pluck($column, $key = null)
            {    
                return \Illuminate\Database\Eloquent\Builder::pluck($column, $key);
            }
         
            /**
             * Paginate the given query.
             *
             * @param int $perPage
             * @param array $columns
             * @param string $pageName
             * @param int|null $page
             * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator 
             * @throws \InvalidArgumentException
             * @static 
             */ 
            public static function paginate($perPage = null, $columns = array(), $pageName = 'page', $page = null)
            {    
                return \Illuminate\Database\Eloquent\Builder::paginate($perPage, $columns, $pageName, $page);
            }
         
            /**
             * Paginate the given query into a simple paginator.
             *
             * @param int $perPage
             * @param array $columns
             * @param string $pageName
             * @param int|null $page
             * @return \Illuminate\Contracts\Pagination\Paginator 
             * @static 
             */ 
            public static function simplePaginate($perPage = null, $columns = array(), $pageName = 'page', $page = null)
            {    
                return \Illuminate\Database\Eloquent\Builder::simplePaginate($perPage, $columns, $pageName, $page);
            }
         
            /**
             * Save a new model and return the instance.
             *
             * @param array $attributes
             * @return \Illuminate\Database\Eloquent\Model 
             * @static 
             */ 
            public static function create($attributes = array())
            {    
                return \Illuminate\Database\Eloquent\Builder::create($attributes);
            }
         
            /**
             * Save a new model and return the instance. Allow mass-assignment.
             *
             * @param array $attributes
             * @return \Illuminate\Database\Eloquent\Model 
             * @static 
             */ 
            public static function forceCreate($attributes)
            {    
                return \Illuminate\Database\Eloquent\Builder::forceCreate($attributes);
            }
         
            /**
             * Register a replacement for the default delete function.
             *
             * @param \Closure $callback
             * @return void 
             * @static 
             */ 
            public static function onDelete($callback)
            {    
                \Illuminate\Database\Eloquent\Builder::onDelete($callback);
            }
         
            /**
             * Call the given local model scopes.
             *
             * @param array $scopes
             * @return mixed 
             * @static 
             */ 
            public static function scopes($scopes)
            {    
                return \Illuminate\Database\Eloquent\Builder::scopes($scopes);
            }
         
            /**
             * Apply the scopes to the Eloquent builder instance and return it.
             *
             * @return \Illuminate\Database\Eloquent\Builder|static 
             * @static 
             */ 
            public static function applyScopes()
            {    
                return \Illuminate\Database\Eloquent\Builder::applyScopes();
            }
         
            /**
             * Prevent the specified relations from being eager loaded.
             *
             * @param mixed $relations
             * @return $this 
             * @static 
             */ 
            public static function without($relations)
            {    
                return \Illuminate\Database\Eloquent\Builder::without($relations);
            }
         
            /**
             * Create a new instance of the model being queried.
             *
             * @param array $attributes
             * @return \Illuminate\Database\Eloquent\Model 
             * @static 
             */ 
            public static function newModelInstance($attributes = array())
            {    
                return \Illuminate\Database\Eloquent\Builder::newModelInstance($attributes);
            }
         
            /**
             * Get the underlying query builder instance.
             *
             * @return \Illuminate\Database\Query\Builder 
             * @static 
             */ 
            public static function getQuery()
            {    
                return \Illuminate\Database\Eloquent\Builder::getQuery();
            }
         
            /**
             * Set the underlying query builder instance.
             *
             * @param \Illuminate\Database\Query\Builder $query
             * @return $this 
             * @static 
             */ 
            public static function setQuery($query)
            {    
                return \Illuminate\Database\Eloquent\Builder::setQuery($query);
            }
         
            /**
             * Get a base query builder instance.
             *
             * @return \Illuminate\Database\Query\Builder 
             * @static 
             */ 
            public static function toBase()
            {    
                return \Illuminate\Database\Eloquent\Builder::toBase();
            }
         
            /**
             * Get the relationships being eagerly loaded.
             *
             * @return array 
             * @static 
             */ 
            public static function getEagerLoads()
            {    
                return \Illuminate\Database\Eloquent\Builder::getEagerLoads();
            }
         
            /**
             * Set the relationships being eagerly loaded.
             *
             * @param array $eagerLoad
             * @return $this 
             * @static 
             */ 
            public static function setEagerLoads($eagerLoad)
            {    
                return \Illuminate\Database\Eloquent\Builder::setEagerLoads($eagerLoad);
            }
         
            /**
             * Get the model instance being queried.
             *
             * @return \Illuminate\Database\Eloquent\Model 
             * @static 
             */ 
            public static function getModel()
            {    
                return \Illuminate\Database\Eloquent\Builder::getModel();
            }
         
            /**
             * Set a model instance for the model being queried.
             *
             * @param \Illuminate\Database\Eloquent\Model $model
             * @return $this 
             * @static 
             */ 
            public static function setModel($model)
            {    
                return \Illuminate\Database\Eloquent\Builder::setModel($model);
            }
         
            /**
             * Get the given macro by name.
             *
             * @param string $name
             * @return \Closure 
             * @static 
             */ 
            public static function getMacro($name)
            {    
                return \Illuminate\Database\Eloquent\Builder::getMacro($name);
            }
         
            /**
             * Chunk the results of the query.
             *
             * @param int $count
             * @param callable $callback
             * @return bool 
             * @static 
             */ 
            public static function chunk($count, $callback)
            {    
                return \Illuminate\Database\Eloquent\Builder::chunk($count, $callback);
            }
         
            /**
             * Execute a callback over each item while chunking.
             *
             * @param callable $callback
             * @param int $count
             * @return bool 
             * @static 
             */ 
            public static function each($callback, $count = 1000)
            {    
                return \Illuminate\Database\Eloquent\Builder::each($callback, $count);
            }
         
            /**
             * Execute the query and get the first result.
             *
             * @param array $columns
             * @return mixed 
             * @static 
             */ 
            public static function first($columns = array())
            {    
                return \Illuminate\Database\Eloquent\Builder::first($columns);
            }
         
            /**
             * Apply the callback's query changes if the given "value" is true.
             *
             * @param mixed $value
             * @param callable $callback
             * @param callable $default
             * @return mixed 
             * @static 
             */ 
            public static function when($value, $callback, $default = null)
            {    
                return \Illuminate\Database\Eloquent\Builder::when($value, $callback, $default);
            }
         
            /**
             * Add a relationship count / exists condition to the query.
             *
             * @param string $relation
             * @param string $operator
             * @param int $count
             * @param string $boolean
             * @param \Closure|null $callback
             * @return \Illuminate\Database\Eloquent\Builder|static 
             * @static 
             */ 
            public static function has($relation, $operator = '>=', $count = 1, $boolean = 'and', $callback = null)
            {    
                return \Illuminate\Database\Eloquent\Builder::has($relation, $operator, $count, $boolean, $callback);
            }
         
            /**
             * Add a relationship count / exists condition to the query with an "or".
             *
             * @param string $relation
             * @param string $operator
             * @param int $count
             * @return \Illuminate\Database\Eloquent\Builder|static 
             * @static 
             */ 
            public static function orHas($relation, $operator = '>=', $count = 1)
            {    
                return \Illuminate\Database\Eloquent\Builder::orHas($relation, $operator, $count);
            }
         
            /**
             * Add a relationship count / exists condition to the query.
             *
             * @param string $relation
             * @param string $boolean
             * @param \Closure|null $callback
             * @return \Illuminate\Database\Eloquent\Builder|static 
             * @static 
             */ 
            public static function doesntHave($relation, $boolean = 'and', $callback = null)
            {    
                return \Illuminate\Database\Eloquent\Builder::doesntHave($relation, $boolean, $callback);
            }
         
            /**
             * Add a relationship count / exists condition to the query with where clauses.
             *
             * @param string $relation
             * @param \Closure|null $callback
             * @param string $operator
             * @param int $count
             * @return \Illuminate\Database\Eloquent\Builder|static 
             * @static 
             */ 
            public static function whereHas($relation, $callback = null, $operator = '>=', $count = 1)
            {    
                return \Illuminate\Database\Eloquent\Builder::whereHas($relation, $callback, $operator, $count);
            }
         
            /**
             * Add a relationship count / exists condition to the query with where clauses and an "or".
             *
             * @param string $relation
             * @param \Closure $callback
             * @param string $operator
             * @param int $count
             * @return \Illuminate\Database\Eloquent\Builder|static 
             * @static 
             */ 
            public static function orWhereHas($relation, $callback = null, $operator = '>=', $count = 1)
            {    
                return \Illuminate\Database\Eloquent\Builder::orWhereHas($relation, $callback, $operator, $count);
            }
         
            /**
             * Add a relationship count / exists condition to the query with where clauses.
             *
             * @param string $relation
             * @param \Closure|null $callback
             * @return \Illuminate\Database\Eloquent\Builder|static 
             * @static 
             */ 
            public static function whereDoesntHave($relation, $callback = null)
            {    
                return \Illuminate\Database\Eloquent\Builder::whereDoesntHave($relation, $callback);
            }
         
            /**
             * Add subselect queries to count the relations.
             *
             * @param mixed $relations
             * @return $this 
             * @static 
             */ 
            public static function withCount($relations)
            {    
                return \Illuminate\Database\Eloquent\Builder::withCount($relations);
            }
         
            /**
             * Merge the where constraints from another query to the current query.
             *
             * @param \Illuminate\Database\Eloquent\Builder $from
             * @return \Illuminate\Database\Eloquent\Builder|static 
             * @static 
             */ 
            public static function mergeConstraintsFrom($from)
            {    
                return \Illuminate\Database\Eloquent\Builder::mergeConstraintsFrom($from);
            }
         
            /**
             * Set the columns to be selected.
             *
             * @param array|mixed $columns
             * @return $this 
             * @static 
             */ 
            public static function select($columns = array())
            {    
                return \Illuminate\Database\Query\Builder::select($columns);
            }
         
            /**
             * Add a new "raw" select expression to the query.
             *
             * @param string $expression
             * @param array $bindings
             * @return \Illuminate\Database\Query\Builder|static 
             * @static 
             */ 
            public static function selectRaw($expression, $bindings = array())
            {    
                return \Illuminate\Database\Query\Builder::selectRaw($expression, $bindings);
            }
         
            /**
             * Add a subselect expression to the query.
             *
             * @param \Closure|\Illuminate\Database\Query\Builder|string $query
             * @param string $as
             * @return \Illuminate\Database\Query\Builder|static 
             * @throws \InvalidArgumentException
             * @static 
             */ 
            public static function selectSub($query, $as)
            {    
                return \Illuminate\Database\Query\Builder::selectSub($query, $as);
            }
         
            /**
             * Add a new select column to the query.
             *
             * @param array|mixed $column
             * @return $this 
             * @static 
             */ 
            public static function addSelect($column)
            {    
                return \Illuminate\Database\Query\Builder::addSelect($column);
            }
         
            /**
             * Force the query to only return distinct results.
             *
             * @return $this 
             * @static 
             */ 
            public static function distinct()
            {    
                return \Illuminate\Database\Query\Builder::distinct();
            }
         
            /**
             * Set the table which the query is targeting.
             *
             * @param string $table
             * @return $this 
             * @static 
             */ 
            public static function from($table)
            {    
                return \Illuminate\Database\Query\Builder::from($table);
            }
         
            /**
             * Add a join clause to the query.
             *
             * @param string $table
             * @param string $first
             * @param string $operator
             * @param string $second
             * @param string $type
             * @param bool $where
             * @return $this 
             * @static 
             */ 
            public static function join($table, $first, $operator = null, $second = null, $type = 'inner', $where = false)
            {    
                return \Illuminate\Database\Query\Builder::join($table, $first, $operator, $second, $type, $where);
            }
         
            /**
             * Add a "join where" clause to the query.
             *
             * @param string $table
             * @param string $first
             * @param string $operator
             * @param string $second
             * @param string $type
             * @return \Illuminate\Database\Query\Builder|static 
             * @static 
             */ 
            public static function joinWhere($table, $first, $operator, $second, $type = 'inner')
            {    
                return \Illuminate\Database\Query\Builder::joinWhere($table, $first, $operator, $second, $type);
            }
         
            /**
             * Add a left join to the query.
             *
             * @param string $table
             * @param string $first
             * @param string $operator
             * @param string $second
             * @return \Illuminate\Database\Query\Builder|static 
             * @static 
             */ 
            public static function leftJoin($table, $first, $operator = null, $second = null)
            {    
                return \Illuminate\Database\Query\Builder::leftJoin($table, $first, $operator, $second);
            }
         
            /**
             * Add a "join where" clause to the query.
             *
             * @param string $table
             * @param string $first
             * @param string $operator
             * @param string $second
             * @return \Illuminate\Database\Query\Builder|static 
             * @static 
             */ 
            public static function leftJoinWhere($table, $first, $operator, $second)
            {    
                return \Illuminate\Database\Query\Builder::leftJoinWhere($table, $first, $operator, $second);
            }
         
            /**
             * Add a right join to the query.
             *
             * @param string $table
             * @param string $first
             * @param string $operator
             * @param string $second
             * @return \Illuminate\Database\Query\Builder|static 
             * @static 
             */ 
            public static function rightJoin($table, $first, $operator = null, $second = null)
            {    
                return \Illuminate\Database\Query\Builder::rightJoin($table, $first, $operator, $second);
            }
         
            /**
             * Add a "right join where" clause to the query.
             *
             * @param string $table
             * @param string $first
             * @param string $operator
             * @param string $second
             * @return \Illuminate\Database\Query\Builder|static 
             * @static 
             */ 
            public static function rightJoinWhere($table, $first, $operator, $second)
            {    
                return \Illuminate\Database\Query\Builder::rightJoinWhere($table, $first, $operator, $second);
            }
         
            /**
             * Add a "cross join" clause to the query.
             *
             * @param string $table
             * @param string $first
             * @param string $operator
             * @param string $second
             * @return \Illuminate\Database\Query\Builder|static 
             * @static 
             */ 
            public static function crossJoin($table, $first = null, $operator = null, $second = null)
            {    
                return \Illuminate\Database\Query\Builder::crossJoin($table, $first, $operator, $second);
            }
         
            /**
             * Pass the query to a given callback.
             *
             * @param \Closure $callback
             * @return \Illuminate\Database\Query\Builder 
             * @static 
             */ 
            public static function tap($callback)
            {    
                return \Illuminate\Database\Query\Builder::tap($callback);
            }
         
            /**
             * Merge an array of where clauses and bindings.
             *
             * @param array $wheres
             * @param array $bindings
             * @return void 
             * @static 
             */ 
            public static function mergeWheres($wheres, $bindings)
            {    
                \Illuminate\Database\Query\Builder::mergeWheres($wheres, $bindings);
            }
         
            /**
             * Add a "where" clause comparing two columns to the query.
             *
             * @param string|array $first
             * @param string|null $operator
             * @param string|null $second
             * @param string|null $boolean
             * @return \Illuminate\Database\Query\Builder|static 
             * @static 
             */ 
            public static function whereColumn($first, $operator = null, $second = null, $boolean = 'and')
            {    
                return \Illuminate\Database\Query\Builder::whereColumn($first, $operator, $second, $boolean);
            }
         
            /**
             * Add an "or where" clause comparing two columns to the query.
             *
             * @param string|array $first
             * @param string|null $operator
             * @param string|null $second
             * @return \Illuminate\Database\Query\Builder|static 
             * @static 
             */ 
            public static function orWhereColumn($first, $operator = null, $second = null)
            {    
                return \Illuminate\Database\Query\Builder::orWhereColumn($first, $operator, $second);
            }
         
            /**
             * Add a raw where clause to the query.
             *
             * @param string $sql
             * @param mixed $bindings
             * @param string $boolean
             * @return $this 
             * @static 
             */ 
            public static function whereRaw($sql, $bindings = array(), $boolean = 'and')
            {    
                return \Illuminate\Database\Query\Builder::whereRaw($sql, $bindings, $boolean);
            }
         
            /**
             * Add a raw or where clause to the query.
             *
             * @param string $sql
             * @param array $bindings
             * @return \Illuminate\Database\Query\Builder|static 
             * @static 
             */ 
            public static function orWhereRaw($sql, $bindings = array())
            {    
                return \Illuminate\Database\Query\Builder::orWhereRaw($sql, $bindings);
            }
         
            /**
             * Add a "where in" clause to the query.
             *
             * @param string $column
             * @param mixed $values
             * @param string $boolean
             * @param bool $not
             * @return $this 
             * @static 
             */ 
            public static function whereIn($column, $values, $boolean = 'and', $not = false)
            {    
                return \Illuminate\Database\Query\Builder::whereIn($column, $values, $boolean, $not);
            }
         
            /**
             * Add an "or where in" clause to the query.
             *
             * @param string $column
             * @param mixed $values
             * @return \Illuminate\Database\Query\Builder|static 
             * @static 
             */ 
            public static function orWhereIn($column, $values)
            {    
                return \Illuminate\Database\Query\Builder::orWhereIn($column, $values);
            }
         
            /**
             * Add a "where not in" clause to the query.
             *
             * @param string $column
             * @param mixed $values
             * @param string $boolean
             * @return \Illuminate\Database\Query\Builder|static 
             * @static 
             */ 
            public static function whereNotIn($column, $values, $boolean = 'and')
            {    
                return \Illuminate\Database\Query\Builder::whereNotIn($column, $values, $boolean);
            }
         
            /**
             * Add an "or where not in" clause to the query.
             *
             * @param string $column
             * @param mixed $values
             * @return \Illuminate\Database\Query\Builder|static 
             * @static 
             */ 
            public static function orWhereNotIn($column, $values)
            {    
                return \Illuminate\Database\Query\Builder::orWhereNotIn($column, $values);
            }
         
            /**
             * Add a "where null" clause to the query.
             *
             * @param string $column
             * @param string $boolean
             * @param bool $not
             * @return $this 
             * @static 
             */ 
            public static function whereNull($column, $boolean = 'and', $not = false)
            {    
                return \Illuminate\Database\Query\Builder::whereNull($column, $boolean, $not);
            }
         
            /**
             * Add an "or where null" clause to the query.
             *
             * @param string $column
             * @return \Illuminate\Database\Query\Builder|static 
             * @static 
             */ 
            public static function orWhereNull($column)
            {    
                return \Illuminate\Database\Query\Builder::orWhereNull($column);
            }
         
            /**
             * Add a "where not null" clause to the query.
             *
             * @param string $column
             * @param string $boolean
             * @return \Illuminate\Database\Query\Builder|static 
             * @static 
             */ 
            public static function whereNotNull($column, $boolean = 'and')
            {    
                return \Illuminate\Database\Query\Builder::whereNotNull($column, $boolean);
            }
         
            /**
             * Add a where between statement to the query.
             *
             * @param string $column
             * @param array $values
             * @param string $boolean
             * @param bool $not
             * @return $this 
             * @static 
             */ 
            public static function whereBetween($column, $values, $boolean = 'and', $not = false)
            {    
                return \Illuminate\Database\Query\Builder::whereBetween($column, $values, $boolean, $not);
            }
         
            /**
             * Add an or where between statement to the query.
             *
             * @param string $column
             * @param array $values
             * @return \Illuminate\Database\Query\Builder|static 
             * @static 
             */ 
            public static function orWhereBetween($column, $values)
            {    
                return \Illuminate\Database\Query\Builder::orWhereBetween($column, $values);
            }
         
            /**
             * Add a where not between statement to the query.
             *
             * @param string $column
             * @param array $values
             * @param string $boolean
             * @return \Illuminate\Database\Query\Builder|static 
             * @static 
             */ 
            public static function whereNotBetween($column, $values, $boolean = 'and')
            {    
                return \Illuminate\Database\Query\Builder::whereNotBetween($column, $values, $boolean);
            }
         
            /**
             * Add an or where not between statement to the query.
             *
             * @param string $column
             * @param array $values
             * @return \Illuminate\Database\Query\Builder|static 
             * @static 
             */ 
            public static function orWhereNotBetween($column, $values)
            {    
                return \Illuminate\Database\Query\Builder::orWhereNotBetween($column, $values);
            }
         
            /**
             * Add an "or where not null" clause to the query.
             *
             * @param string $column
             * @return \Illuminate\Database\Query\Builder|static 
             * @static 
             */ 
            public static function orWhereNotNull($column)
            {    
                return \Illuminate\Database\Query\Builder::orWhereNotNull($column);
            }
         
            /**
             * Add a "where date" statement to the query.
             *
             * @param string $column
             * @param string $operator
             * @param mixed $value
             * @param string $boolean
             * @return \Illuminate\Database\Query\Builder|static 
             * @static 
             */ 
            public static function whereDate($column, $operator, $value = null, $boolean = 'and')
            {    
                return \Illuminate\Database\Query\Builder::whereDate($column, $operator, $value, $boolean);
            }
         
            /**
             * Add an "or where date" statement to the query.
             *
             * @param string $column
             * @param string $operator
             * @param string $value
             * @return \Illuminate\Database\Query\Builder|static 
             * @static 
             */ 
            public static function orWhereDate($column, $operator, $value)
            {    
                return \Illuminate\Database\Query\Builder::orWhereDate($column, $operator, $value);
            }
         
            /**
             * Add a "where time" statement to the query.
             *
             * @param string $column
             * @param string $operator
             * @param int $value
             * @param string $boolean
             * @return \Illuminate\Database\Query\Builder|static 
             * @static 
             */ 
            public static function whereTime($column, $operator, $value, $boolean = 'and')
            {    
                return \Illuminate\Database\Query\Builder::whereTime($column, $operator, $value, $boolean);
            }
         
            /**
             * Add an "or where time" statement to the query.
             *
             * @param string $column
             * @param string $operator
             * @param int $value
             * @return \Illuminate\Database\Query\Builder|static 
             * @static 
             */ 
            public static function orWhereTime($column, $operator, $value)
            {    
                return \Illuminate\Database\Query\Builder::orWhereTime($column, $operator, $value);
            }
         
            /**
             * Add a "where day" statement to the query.
             *
             * @param string $column
             * @param string $operator
             * @param mixed $value
             * @param string $boolean
             * @return \Illuminate\Database\Query\Builder|static 
             * @static 
             */ 
            public static function whereDay($column, $operator, $value = null, $boolean = 'and')
            {    
                return \Illuminate\Database\Query\Builder::whereDay($column, $operator, $value, $boolean);
            }
         
            /**
             * Add a "where month" statement to the query.
             *
             * @param string $column
             * @param string $operator
             * @param mixed $value
             * @param string $boolean
             * @return \Illuminate\Database\Query\Builder|static 
             * @static 
             */ 
            public static function whereMonth($column, $operator, $value = null, $boolean = 'and')
            {    
                return \Illuminate\Database\Query\Builder::whereMonth($column, $operator, $value, $boolean);
            }
         
            /**
             * Add a "where year" statement to the query.
             *
             * @param string $column
             * @param string $operator
             * @param mixed $value
             * @param string $boolean
             * @return \Illuminate\Database\Query\Builder|static 
             * @static 
             */ 
            public static function whereYear($column, $operator, $value = null, $boolean = 'and')
            {    
                return \Illuminate\Database\Query\Builder::whereYear($column, $operator, $value, $boolean);
            }
         
            /**
             * Add a nested where statement to the query.
             *
             * @param \Closure $callback
             * @param string $boolean
             * @return \Illuminate\Database\Query\Builder|static 
             * @static 
             */ 
            public static function whereNested($callback, $boolean = 'and')
            {    
                return \Illuminate\Database\Query\Builder::whereNested($callback, $boolean);
            }
         
            /**
             * Create a new query instance for nested where condition.
             *
             * @return \Illuminate\Database\Query\Builder 
             * @static 
             */ 
            public static function forNestedWhere()
            {    
                return \Illuminate\Database\Query\Builder::forNestedWhere();
            }
         
            /**
             * Add another query builder as a nested where to the query builder.
             *
             * @param \Illuminate\Database\Query\Builder|static $query
             * @param string $boolean
             * @return $this 
             * @static 
             */ 
            public static function addNestedWhereQuery($query, $boolean = 'and')
            {    
                return \Illuminate\Database\Query\Builder::addNestedWhereQuery($query, $boolean);
            }
         
            /**
             * Add an exists clause to the query.
             *
             * @param \Closure $callback
             * @param string $boolean
             * @param bool $not
             * @return $this 
             * @static 
             */ 
            public static function whereExists($callback, $boolean = 'and', $not = false)
            {    
                return \Illuminate\Database\Query\Builder::whereExists($callback, $boolean, $not);
            }
         
            /**
             * Add an or exists clause to the query.
             *
             * @param \Closure $callback
             * @param bool $not
             * @return \Illuminate\Database\Query\Builder|static 
             * @static 
             */ 
            public static function orWhereExists($callback, $not = false)
            {    
                return \Illuminate\Database\Query\Builder::orWhereExists($callback, $not);
            }
         
            /**
             * Add a where not exists clause to the query.
             *
             * @param \Closure $callback
             * @param string $boolean
             * @return \Illuminate\Database\Query\Builder|static 
             * @static 
             */ 
            public static function whereNotExists($callback, $boolean = 'and')
            {    
                return \Illuminate\Database\Query\Builder::whereNotExists($callback, $boolean);
            }
         
            /**
             * Add a where not exists clause to the query.
             *
             * @param \Closure $callback
             * @return \Illuminate\Database\Query\Builder|static 
             * @static 
             */ 
            public static function orWhereNotExists($callback)
            {    
                return \Illuminate\Database\Query\Builder::orWhereNotExists($callback);
            }
         
            /**
             * Add an exists clause to the query.
             *
             * @param \Illuminate\Database\Query\Builder $query
             * @param string $boolean
             * @param bool $not
             * @return $this 
             * @static 
             */ 
            public static function addWhereExistsQuery($query, $boolean = 'and', $not = false)
            {    
                return \Illuminate\Database\Query\Builder::addWhereExistsQuery($query, $boolean, $not);
            }
         
            /**
             * Handles dynamic "where" clauses to the query.
             *
             * @param string $method
             * @param string $parameters
             * @return $this 
             * @static 
             */ 
            public static function dynamicWhere($method, $parameters)
            {    
                return \Illuminate\Database\Query\Builder::dynamicWhere($method, $parameters);
            }
         
            /**
             * Add a "group by" clause to the query.
             *
             * @param array $groups
             * @return $this 
             * @static 
             */ 
            public static function groupBy($groups = null)
            {    
                return \Illuminate\Database\Query\Builder::groupBy($groups);
            }
         
            /**
             * Add a "having" clause to the query.
             *
             * @param string $column
             * @param string $operator
             * @param string $value
             * @param string $boolean
             * @return $this 
             * @static 
             */ 
            public static function having($column, $operator = null, $value = null, $boolean = 'and')
            {    
                return \Illuminate\Database\Query\Builder::having($column, $operator, $value, $boolean);
            }
         
            /**
             * Add a "or having" clause to the query.
             *
             * @param string $column
             * @param string $operator
             * @param string $value
             * @return \Illuminate\Database\Query\Builder|static 
             * @static 
             */ 
            public static function orHaving($column, $operator = null, $value = null)
            {    
                return \Illuminate\Database\Query\Builder::orHaving($column, $operator, $value);
            }
         
            /**
             * Add a raw having clause to the query.
             *
             * @param string $sql
             * @param array $bindings
             * @param string $boolean
             * @return $this 
             * @static 
             */ 
            public static function havingRaw($sql, $bindings = array(), $boolean = 'and')
            {    
                return \Illuminate\Database\Query\Builder::havingRaw($sql, $bindings, $boolean);
            }
         
            /**
             * Add a raw or having clause to the query.
             *
             * @param string $sql
             * @param array $bindings
             * @return \Illuminate\Database\Query\Builder|static 
             * @static 
             */ 
            public static function orHavingRaw($sql, $bindings = array())
            {    
                return \Illuminate\Database\Query\Builder::orHavingRaw($sql, $bindings);
            }
         
            /**
             * Add an "order by" clause to the query.
             *
             * @param string $column
             * @param string $direction
             * @return $this 
             * @static 
             */ 
            public static function orderBy($column, $direction = 'asc')
            {    
                return \Illuminate\Database\Query\Builder::orderBy($column, $direction);
            }
         
            /**
             * Add a descending "order by" clause to the query.
             *
             * @param string $column
             * @return $this 
             * @static 
             */ 
            public static function orderByDesc($column)
            {    
                return \Illuminate\Database\Query\Builder::orderByDesc($column);
            }
         
            /**
             * Add an "order by" clause for a timestamp to the query.
             *
             * @param string $column
             * @return \Illuminate\Database\Query\Builder|static 
             * @static 
             */ 
            public static function latest($column = 'created_at')
            {    
                return \Illuminate\Database\Query\Builder::latest($column);
            }
         
            /**
             * Add an "order by" clause for a timestamp to the query.
             *
             * @param string $column
             * @return \Illuminate\Database\Query\Builder|static 
             * @static 
             */ 
            public static function oldest($column = 'created_at')
            {    
                return \Illuminate\Database\Query\Builder::oldest($column);
            }
         
            /**
             * Put the query's results in random order.
             *
             * @param string $seed
             * @return $this 
             * @static 
             */ 
            public static function inRandomOrder($seed = '')
            {    
                return \Illuminate\Database\Query\Builder::inRandomOrder($seed);
            }
         
            /**
             * Add a raw "order by" clause to the query.
             *
             * @param string $sql
             * @param array $bindings
             * @return $this 
             * @static 
             */ 
            public static function orderByRaw($sql, $bindings = array())
            {    
                return \Illuminate\Database\Query\Builder::orderByRaw($sql, $bindings);
            }
         
            /**
             * Alias to set the "offset" value of the query.
             *
             * @param int $value
             * @return \Illuminate\Database\Query\Builder|static 
             * @static 
             */ 
            public static function skip($value)
            {    
                return \Illuminate\Database\Query\Builder::skip($value);
            }
         
            /**
             * Set the "offset" value of the query.
             *
             * @param int $value
             * @return $this 
             * @static 
             */ 
            public static function offset($value)
            {    
                return \Illuminate\Database\Query\Builder::offset($value);
            }
         
            /**
             * Alias to set the "limit" value of the query.
             *
             * @param int $value
             * @return \Illuminate\Database\Query\Builder|static 
             * @static 
             */ 
            public static function take($value)
            {    
                return \Illuminate\Database\Query\Builder::take($value);
            }
         
            /**
             * Set the "limit" value of the query.
             *
             * @param int $value
             * @return $this 
             * @static 
             */ 
            public static function limit($value)
            {    
                return \Illuminate\Database\Query\Builder::limit($value);
            }
         
            /**
             * Set the limit and offset for a given page.
             *
             * @param int $page
             * @param int $perPage
             * @return \Illuminate\Database\Query\Builder|static 
             * @static 
             */ 
            public static function forPage($page, $perPage = 15)
            {    
                return \Illuminate\Database\Query\Builder::forPage($page, $perPage);
            }
         
            /**
             * Constrain the query to the next "page" of results after a given ID.
             *
             * @param int $perPage
             * @param int $lastId
             * @param string $column
             * @return \Illuminate\Database\Query\Builder|static 
             * @static 
             */ 
            public static function forPageAfterId($perPage = 15, $lastId = 0, $column = 'id')
            {    
                return \Illuminate\Database\Query\Builder::forPageAfterId($perPage, $lastId, $column);
            }
         
            /**
             * Add a union statement to the query.
             *
             * @param \Illuminate\Database\Query\Builder|\Closure $query
             * @param bool $all
             * @return \Illuminate\Database\Query\Builder|static 
             * @static 
             */ 
            public static function union($query, $all = false)
            {    
                return \Illuminate\Database\Query\Builder::union($query, $all);
            }
         
            /**
             * Add a union all statement to the query.
             *
             * @param \Illuminate\Database\Query\Builder|\Closure $query
             * @return \Illuminate\Database\Query\Builder|static 
             * @static 
             */ 
            public static function unionAll($query)
            {    
                return \Illuminate\Database\Query\Builder::unionAll($query);
            }
         
            /**
             * Lock the selected rows in the table.
             *
             * @param string|bool $value
             * @return $this 
             * @static 
             */ 
            public static function lock($value = true)
            {    
                return \Illuminate\Database\Query\Builder::lock($value);
            }
         
            /**
             * Lock the selected rows in the table for updating.
             *
             * @return \Illuminate\Database\Query\Builder 
             * @static 
             */ 
            public static function lockForUpdate()
            {    
                return \Illuminate\Database\Query\Builder::lockForUpdate();
            }
         
            /**
             * Share lock the selected rows in the table.
             *
             * @return \Illuminate\Database\Query\Builder 
             * @static 
             */ 
            public static function sharedLock()
            {    
                return \Illuminate\Database\Query\Builder::sharedLock();
            }
         
            /**
             * Get the SQL representation of the query.
             *
             * @return string 
             * @static 
             */ 
            public static function toSql()
            {    
                return \Illuminate\Database\Query\Builder::toSql();
            }
         
            /**
             * Get the count of the total records for the paginator.
             *
             * @param array $columns
             * @return int 
             * @static 
             */ 
            public static function getCountForPagination($columns = array())
            {    
                return \Illuminate\Database\Query\Builder::getCountForPagination($columns);
            }
         
            /**
             * Concatenate values of a given column as a string.
             *
             * @param string $column
             * @param string $glue
             * @return string 
             * @static 
             */ 
            public static function implode($column, $glue = '')
            {    
                return \Illuminate\Database\Query\Builder::implode($column, $glue);
            }
         
            /**
             * Determine if any rows exist for the current query.
             *
             * @return bool 
             * @static 
             */ 
            public static function exists()
            {    
                return \Illuminate\Database\Query\Builder::exists();
            }
         
            /**
             * Retrieve the "count" result of the query.
             *
             * @param string $columns
             * @return int 
             * @static 
             */ 
            public static function count($columns = '*')
            {    
                return \Illuminate\Database\Query\Builder::count($columns);
            }
         
            /**
             * Retrieve the minimum value of a given column.
             *
             * @param string $column
             * @return mixed 
             * @static 
             */ 
            public static function min($column)
            {    
                return \Illuminate\Database\Query\Builder::min($column);
            }
         
            /**
             * Retrieve the maximum value of a given column.
             *
             * @param string $column
             * @return mixed 
             * @static 
             */ 
            public static function max($column)
            {    
                return \Illuminate\Database\Query\Builder::max($column);
            }
         
            /**
             * Retrieve the sum of the values of a given column.
             *
             * @param string $column
             * @return mixed 
             * @static 
             */ 
            public static function sum($column)
            {    
                return \Illuminate\Database\Query\Builder::sum($column);
            }
         
            /**
             * Retrieve the average of the values of a given column.
             *
             * @param string $column
             * @return mixed 
             * @static 
             */ 
            public static function avg($column)
            {    
                return \Illuminate\Database\Query\Builder::avg($column);
            }
         
            /**
             * Alias for the "avg" method.
             *
             * @param string $column
             * @return mixed 
             * @static 
             */ 
            public static function average($column)
            {    
                return \Illuminate\Database\Query\Builder::average($column);
            }
         
            /**
             * Execute an aggregate function on the database.
             *
             * @param string $function
             * @param array $columns
             * @return mixed 
             * @static 
             */ 
            public static function aggregate($function, $columns = array())
            {    
                return \Illuminate\Database\Query\Builder::aggregate($function, $columns);
            }
         
            /**
             * Execute a numeric aggregate function on the database.
             *
             * @param string $function
             * @param array $columns
             * @return float|int 
             * @static 
             */ 
            public static function numericAggregate($function, $columns = array())
            {    
                return \Illuminate\Database\Query\Builder::numericAggregate($function, $columns);
            }
         
            /**
             * Insert a new record into the database.
             *
             * @param array $values
             * @return bool 
             * @static 
             */ 
            public static function insert($values)
            {    
                return \Illuminate\Database\Query\Builder::insert($values);
            }
         
            /**
             * Insert a new record and get the value of the primary key.
             *
             * @param array $values
             * @param string $sequence
             * @return int 
             * @static 
             */ 
            public static function insertGetId($values, $sequence = null)
            {    
                return \Illuminate\Database\Query\Builder::insertGetId($values, $sequence);
            }
         
            /**
             * Insert or update a record matching the attributes, and fill it with values.
             *
             * @param array $attributes
             * @param array $values
             * @return bool 
             * @static 
             */ 
            public static function updateOrInsert($attributes, $values = array())
            {    
                return \Illuminate\Database\Query\Builder::updateOrInsert($attributes, $values);
            }
         
            /**
             * Run a truncate statement on the table.
             *
             * @return void 
             * @static 
             */ 
            public static function truncate()
            {    
                \Illuminate\Database\Query\Builder::truncate();
            }
         
            /**
             * Create a raw database expression.
             *
             * @param mixed $value
             * @return \Illuminate\Database\Query\Expression 
             * @static 
             */ 
            public static function raw($value)
            {    
                return \Illuminate\Database\Query\Builder::raw($value);
            }
         
            /**
             * Get the current query value bindings in a flattened array.
             *
             * @return array 
             * @static 
             */ 
            public static function getBindings()
            {    
                return \Illuminate\Database\Query\Builder::getBindings();
            }
         
            /**
             * Get the raw array of bindings.
             *
             * @return array 
             * @static 
             */ 
            public static function getRawBindings()
            {    
                return \Illuminate\Database\Query\Builder::getRawBindings();
            }
         
            /**
             * Set the bindings on the query builder.
             *
             * @param array $bindings
             * @param string $type
             * @return $this 
             * @throws \InvalidArgumentException
             * @static 
             */ 
            public static function setBindings($bindings, $type = 'where')
            {    
                return \Illuminate\Database\Query\Builder::setBindings($bindings, $type);
            }
         
            /**
             * Add a binding to the query.
             *
             * @param mixed $value
             * @param string $type
             * @return $this 
             * @throws \InvalidArgumentException
             * @static 
             */ 
            public static function addBinding($value, $type = 'where')
            {    
                return \Illuminate\Database\Query\Builder::addBinding($value, $type);
            }
         
            /**
             * Merge an array of bindings into our bindings.
             *
             * @param \Illuminate\Database\Query\Builder $query
             * @return $this 
             * @static 
             */ 
            public static function mergeBindings($query)
            {    
                return \Illuminate\Database\Query\Builder::mergeBindings($query);
            }
         
            /**
             * Get the database query processor instance.
             *
             * @return \Illuminate\Database\Query\Processors\Processor 
             * @static 
             */ 
            public static function getProcessor()
            {    
                return \Illuminate\Database\Query\Builder::getProcessor();
            }
         
            /**
             * Get the query grammar instance.
             *
             * @return \Illuminate\Database\Query\Grammars\Grammar 
             * @static 
             */ 
            public static function getGrammar()
            {    
                return \Illuminate\Database\Query\Builder::getGrammar();
            }
         
            /**
             * Use the write pdo for query.
             *
             * @return $this 
             * @static 
             */ 
            public static function useWritePdo()
            {    
                return \Illuminate\Database\Query\Builder::useWritePdo();
            }
         
            /**
             * Clone the query without the given properties.
             *
             * @param array $except
             * @return static 
             * @static 
             */ 
            public static function cloneWithout($except)
            {    
                return \Illuminate\Database\Query\Builder::cloneWithout($except);
            }
         
            /**
             * Clone the query without the given bindings.
             *
             * @param array $except
             * @return static 
             * @static 
             */ 
            public static function cloneWithoutBindings($except)
            {    
                return \Illuminate\Database\Query\Builder::cloneWithoutBindings($except);
            }
         
            /**
             * Register a custom macro.
             *
             * @param string $name
             * @param callable $macro
             * @return void 
             * @static 
             */ 
            public static function macro($name, $macro)
            {    
                \Illuminate\Database\Query\Builder::macro($name, $macro);
            }
         
            /**
             * Checks if macro is registered.
             *
             * @param string $name
             * @return bool 
             * @static 
             */ 
            public static function hasMacro($name)
            {    
                return \Illuminate\Database\Query\Builder::hasMacro($name);
            }
         
            /**
             * Dynamically handle calls to the class.
             *
             * @param string $method
             * @param array $parameters
             * @return mixed 
             * @throws \BadMethodCallException
             * @static 
             */ 
            public static function macroCall($method, $parameters)
            {    
                return \Illuminate\Database\Query\Builder::macroCall($method, $parameters);
            }
        }

    class Schema extends \Illuminate\Support\Facades\Schema {}

    class JWTAuth extends \Tymon\JWTAuth\Facades\JWTAuth {}

    class JWTFactory extends \Tymon\JWTAuth\Facades\JWTFactory {}
 
}



