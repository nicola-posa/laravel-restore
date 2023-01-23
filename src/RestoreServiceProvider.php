<?php

namespace DefStudio\Restore;

use DefStudio\Restore\Commands\RestoreCommand;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class RestoreServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                RestoreCommand::class,
            ]);
        }
    }
}
