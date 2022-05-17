<?php

namespace ArtisanWebLab\NestedTree;

use ArtisanWebLab\NestedTree\Database\Dongle;
use Illuminate\Support\ServiceProvider;

class NestedTreeServiceProvider extends ServiceProvider
{
    /**
     * Register the service provider.
     * @return void
     */
    public function register()
    {
        $this->app->singleton('db.dongle', function ($app) {
            return new Dongle($this->getDefaultDatabaseDriver(), $app['db']);
        });
    }

    /**
     * Returns the default database driver, not just the connection name.
     * @return string
     */
    protected function getDefaultDatabaseDriver()
    {
        $defaultConnection = $this->app['db']->getDefaultConnection();
        return $this->app['config']['database.connections.' . $defaultConnection . '.driver'];
    }
}
