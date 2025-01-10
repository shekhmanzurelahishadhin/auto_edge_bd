<?php

namespace App\Providers;

use App\Models\Faculty;
use App\Models\Notice;
use App\Models\Office;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use OwenIt\Auditing\Models\Audit;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $loader = \Illuminate\Foundation\AliasLoader::getInstance();
        $loader->alias('Debugbar', \Barryvdh\Debugbar\Facades\Debugbar::class);
    }


    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        Paginator::useBootstrap();


        view()->composer(['layouts/frontend/partials/footer'], function ($view){
            $view->with('last_updated',Audit::latest()->first());
        });

    }
}
