<?php

namespace Tests;

use Illuminate\Contracts\Console\Kernel;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Bootstrap\LoadConfiguration;
use Illuminate\Foundation\Bootstrap\LoadEnvironmentVariables;
use RuntimeException;

trait CreatesApplication
{
    /**
     * Creates the application.
     */
    public function createApplication(): Application
    {
        $app = require __DIR__.'/../bootstrap/app.php';

        // Jangan pernah memuat konfigurasi tersimpan atau rahasia .env pada pengujian.
        if ($app->configurationIsCached() || is_file($app->getCachedRoutesPath())) {
            throw new RuntimeException('Pengujian dibatalkan: konfigurasi atau route masih tersimpan dalam cache.');
        }

        $app->instance(LoadEnvironmentVariables::class, new class
        {
            public function bootstrap(Application $app): void
            {
                // Pengujian hanya memakai konfigurasi terisolasi di bawah ini.
            }
        });

        $app->afterBootstrapping(LoadConfiguration::class, function (Application $app) {
            $app['config']->set([
                'app.env' => 'testing',
                'app.debug' => false,
                'app.key' => 'base64:'.base64_encode(str_repeat('a', 32)),
                'app.url' => 'http://localhost',
                'database.default' => 'sqlite',
                'database.connections' => [
                    'sqlite' => [
                        'driver' => 'sqlite',
                        'database' => ':memory:',
                        'prefix' => '',
                        'foreign_key_constraints' => true,
                    ],
                ],
                'cache.default' => 'array',
                'session.driver' => 'array',
                'mail.default' => 'array',
                'mail.from' => ['address' => 'noreply@example.test', 'name' => 'LegalTrack'],
                'queue.default' => 'sync',
                'logging.default' => 'null',
                'hashing.bcrypt.rounds' => 4,
            ]);

            $app->detectEnvironment(fn () => 'testing');
        });

        $app->make(Kernel::class)->bootstrap();

        if ($app['config']->get('database.default') !== 'sqlite'
            || $app['config']->get('database.connections.sqlite.driver') !== 'sqlite'
            || $app['config']->get('database.connections.sqlite.database') !== ':memory:'
            || $app['config']->get('database.connections.sqlite.url') !== null
            || array_keys($app['config']->get('database.connections')) !== ['sqlite']) {
            throw new RuntimeException('Pengujian dibatalkan: database SQLite dalam memori tidak terisolasi.');
        }

        return $app;
    }
}
