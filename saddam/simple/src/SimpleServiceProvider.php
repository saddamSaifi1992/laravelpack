<?php 

namespace Saddam\Simple;

use Saddam\Simple\Simple;
use Illuminate\Support\ServiceProvider;

class SimpleServiceProvider extends ServiceProvider {

    public function boot()
    {
         $this->publishes([
             __DIR__.'/../src/config/simpleconfig.php' => config_path('simpleconfig.php')
         ]);
    }
    public function register()
    {
        $this->app->singleton(Simple::class, function()
        {
            return new Simple();
        });
    } 

}