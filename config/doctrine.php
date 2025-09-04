<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Database Connection
    |--------------------------------------------------------------------------
    |
    | Define your database connection parameters here. These values are pulled
    | from your environment file using the env() helper for security.
    | Customize driver, host, port, database name, username, password, and PDO options.
    | 
    | Available drivers supported by Doctrine ORM:
    | - pdo_mysql   (MySQL)
    | - pdo_pgsql   (PostgreSQL)
    | - pdo_sqlite  (SQLite)
    | - pdo_sqlsrv  (SQL Server / MSSQL)
    | - oci8        (Oracle)
    |
    | Make sure to set your DB_CONNECTION environment variable to one of these.
    |
    */
    'connection' => [
        'driver' => 'pdo_pgsql',
        'host' => env('DB_HOST'),
        'port' => env('DB_PORT'),
        'dbname' => env('DB_DATABASE'),
        'user' => env('DB_USERNAME'),
        'password' => env('DB_PASSWORD'),
        'options' => [
            \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
            \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Redis SSL Options
    |--------------------------------------------------------------------------
    |
    | Configure optional SSL options for your Redis connection.
    | Uncomment and adjust below if SSL is required for Redis.
    |
    */
    'redis_ssl_options' => [
        // 'ssl' => [
        //     'cafile' => env('REDIS_CAFILE'),
        //     'local_cert' => env('REDIS_CLIENT_CERT'),
        //     'local_pk' => env('REDIS_CLIENT_KEY'),
        //     'verify_peer' => filter_var(env('REDIS_VERIFY_PEER'), FILTER_VALIDATE_BOOLEAN),
        //     'verify_peer_name' => filter_var(env('REDIS_VERIFY_PEER_NAME'), FILTER_VALIDATE_BOOLEAN),
        // ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Metadata Directories
    |--------------------------------------------------------------------------
    |
    | Paths where Doctrine will look for metadata with attributes to map your entities.
    | Typically, this points to your application's Entities directory.
    |
    */
    'metadata_dirs' => [
        app_path('Entities'),
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Doctrine Types
    |--------------------------------------------------------------------------
    |
    | Register any custom Doctrine types here.
    | Example here registers UUID type from ramsey/uuid package.
    |
    */
    'custom_types' => [
        \Ramsey\Uuid\Doctrine\UuidType::NAME => \Ramsey\Uuid\Doctrine\UuidType::class,
    ],

    /*
    |--------------------------------------------------------------------------
    | Redis Connection URL
    |--------------------------------------------------------------------------
    |
    | You can specify your Redis connection as a URL.
    | For example: redis://localhost:6379
    |
    */
    'redis_url' => env('REDIS_URL'),

    /*
    |--------------------------------------------------------------------------
    | Development Mode
    |--------------------------------------------------------------------------
    |
    | When set to true, Doctrine will generate proxies and metadata dynamically.
    | Typically enabled in local or dev environments.
    |
    */
    'dev_mode' => env('APP_ENV') === 'dev',
];
