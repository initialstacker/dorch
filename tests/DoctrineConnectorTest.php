<?php declare(strict_types=1);

namespace Initialstacker\Dorch\Tests;

use Initialstacker\Dorch\DoctrineConnector;
use Illuminate\Foundation\Application;
use PHPUnit\Framework\TestCase;
use Doctrine\ORM\EntityManagerInterface;

final class DoctrineConnectorTest extends TestCase
{
    private Application $app;

    protected function setUp(): void
    {
        parent::setUp();

        $this->app = $this->createMock(Application::class);
        
        global function config($key, $default = null) {
            $configs = [
                'doctrine.redis_url' => 'redis://127.0.0.1:6379',
                'doctrine.redis_ssl_options' => [],
                'doctrine.metadata_dirs' => [__DIR__ . '/../Entities'],
                'doctrine.dev_mode' => true,
                'doctrine.connection' => [
                    'driver' => 'pdo_sqlite',
                    'memory' => true,
                ],
                'doctrine.custom_types' => [],
            ];
            return $configs[$key] ?? $default;
        }
    }

    public function testEntityManagerRegistered(): void
    {
        $provider = new DoctrineConnector($this->app);
        $provider->register();
        $entityManager = $this->app->make(EntityManagerInterface::class);

        $this->assertInstanceOf(EntityManagerInterface::class, $entityManager);
    }
}