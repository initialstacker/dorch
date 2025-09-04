# Dorch

Laravel Doctrine ORM connector package enabling seamless integration of Doctrine ORM within Laravel applications.

## Features

- Easy setup of Doctrine EntityManager in Laravel service container
- Support for custom Doctrine types (e.g., Ramsey UUID)
- Configurable metadata directories and connection options
- Redis cache integration for metadata and proxies
- Development mode support for proxy generation
- Clean Laravel service provider design

## Installation

Require the package via Composer:

```
composer require initialstacker/dorch
```

Publish the configuration file:

```
php artisan vendor:publish --tag=doctrine
```

## Manual Service Provider Registration

Laravel requires service providers to be registered manually by adding their class name to the providers array.

Open your `bootstrap/providers.php`:

```
<?php return [
	// Other service providers...
	Initialstacker\Dorch\DoctrineConnector::class,
];
```

This step is necessary because Laravel loads service providers listed in this array during application bootstrapping. Without adding your service provider class here, your package will not be connected to Laravel.

## Configuration

Configure your database and cache settings in `config/doctrine.php`. Example drivers supported:

- `pdo_mysql` (MySQL)
- `pdo_pgsql` (PostgreSQL)
- `pdo_sqlite` (SQLite)
- `pdo_sqlsrv` (SQL Server)
- `oci8` (Oracle)

Set your connection according to preferred driver and database credentials.

## Usage

Once installed and configured, the Doctrine EntityManager can be resolved from Laravel's service container:

```
use Doctrine\ORM\EntityManagerInterface;

$entityManager = app(EntityManagerInterface::class);

// Use $entityManager to persist, find, and query entities
```

## License

This package is open-sourced software licensed under the [MIT License](https://opensource.org/licenses/MIT).