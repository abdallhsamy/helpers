<?php

namespace AbdallhSamy\Helpers\Providers;

use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Collection;
use Illuminate\Support\ServiceProvider;

class HelperServiceProvider extends ServiceProvider
{
    function boot(Filesystem $filesystem)
    {
        if (function_exists('config_path')) {
            $this->publishes([
                __DIR__ . '/../config/helpers.php' => config_path('helpers.php')
            ], 'config');
        }

        if (function_exists('config_path')) {
            $this->publishes([
                __DIR__ . '/../database/migrations/create_activity_log_table.php.stub' => $this->getMigrationFileName($filesystem)
            ], 'migrations');
        }
    }

    function register()
    {
        $this->mergeConfigFrom(
            __DIR__ . '/../config/helpers.php',
            'helpers'
        );
    }

    /**
     * return existing migration file if found, else uses the current timestamp
     *
     * @param Filesystem $filesystem
     * @return string
     */
    protected function getMigrationFileName(Filesystem $filesystem) :string
    {
        $timestamp = date('Y_m_d_His');

        $items = $this->app->databasePath() . DIRECTORY_SEPARATOR . 'migrations' . DIRECTORY_SEPARATOR;

        $fileName = 'create_activity_log_table.php';

        return Collection::make($items)
            ->flatMap(function ($path) use ($filesystem, $fileName) {
                return $filesystem->glob($path  . "*_{$fileName}");
            })->push($this->app->databasePath() . "/migrations/{$timestamp}_{$fileName}")
            ->first();
    }
}
