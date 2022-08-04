<?php

namespace Aoeng\Laravel\Workerman;


use GatewayWorker\Lib\Gateway;
use Illuminate\Support\ServiceProvider;

class WorkermanServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../config/workerman.php' => config_path('workerman.php'),
        ], 'workerman');

        if ($this->app->runningInConsole()) {
            $this->commands([
                WorkermanCommand::class
            ]);
        }
    }

    public function register()
    {
        $this->app->singleton('workerman-gateway', function () {
            return new  Gateway();
        });
    }

}
