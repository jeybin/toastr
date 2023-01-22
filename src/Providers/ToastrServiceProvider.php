<?php

namespace Jeybin\Toastr\Providers;

use Illuminate\Support\ServiceProvider;
use Jeybin\Toastr\Facades\ToastrFacades;
use Jeybin\Toastr\Console\PublishToastrProviders;

class ToastrServiceProvider extends ServiceProvider
{   

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {

        /**
         * Config file merging into the project
         */
        
        $configs = [
            __DIR__.'/../Config/jeybin-toastr.php' => config_path('jeybin-toastr.php') 
        ];

        $this->publishes($configs, 'toastr-config');


        /**
         * Checking if the app is 
         * running from console
         */
        if ($this->app->runningInConsole()) {

            /**
             * Adding custom commands class to the 
             * service provider
             */
            $this->commands([
                PublishToastrProviders::class
            ]);
        }

    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register(){

        $this->mergeConfigFrom(
            __DIR__.'/../Config/jeybin-toastr.php', 'toastr-config'
        );

        
        $this->app->bind('toastr',fn($app)=>new ToastrFacades($app));

        $this->app->alias('toastr', ToastrFacades::class);

    }
}