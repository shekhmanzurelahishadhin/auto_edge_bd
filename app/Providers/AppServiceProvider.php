<?php

namespace App\Providers;

use App\Models\Faculty;
use App\Models\Logo;
use App\Models\Notice;
use App\Models\Office;
use App\Models\Setting;
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


        view()->composer(['layouts/frontend/partials/footer','layouts/frontend/partials/header','layouts/frontend/partials/top_nav','layouts/frontend/partials/mobile-sidebar','layouts/frontend/master'], function ($view){
            $view->with('last_updated',Audit::latest()->first());
            $view->with('logo',Logo::latest()->first());
            $view->with('footer_details',Setting::where('name', 'footer_details')->latest()->first(['value']));
            $view->with('email',Setting::where('name', 'website_email')->latest()->first(['value']));
            $view->with('address',Setting::where('name', 'website_address')->latest()->first(['value']));
            $view->with('phone',Setting::where('name', 'website_phone')->latest()->first(['value']));
            $view->with('facebook',Setting::where('name', 'website_facebook')->latest()->first(['value']));
            $view->with('tweeter',Setting::where('name', 'website_twitter')->latest()->first(['value']));
            $view->with('linkedin',Setting::where('name', 'website_linkedin')->latest()->first(['value']));
            $view->with('instagram',Setting::where('name', 'website_instagram')->latest()->first(['value']));
        });
//        view()->composer(['layouts/frontend/partials/header'], function ($view){
//            $view->with('last_updated',Audit::latest()->first());
//            $view->with('logo',Logo::latest()->first());
//
//            $view->with('email',Setting::where('name', 'website_email')->latest()->first(['value']));
//            $view->with('address',Setting::where('name', 'website_address')->latest()->first(['value']));
//            $view->with('phone',Setting::where('name', 'website_phone')->latest()->first(['value']));
//            $view->with('facebook',Setting::where('name', 'website_facebook')->latest()->first(['value']));
//            $view->with('tweeter',Setting::where('name', 'website_twitter')->latest()->first(['value']));
//            $view->with('linkedin',Setting::where('name', 'website_linkedin')->latest()->first(['value']));
//            $view->with('instagram',Setting::where('name', 'website_instagram')->latest()->first(['value']));
//        });
//        view()->composer(['layouts/frontend/partials/mobile-sidebar'], function ($view){
//            $view->with('last_updated',Audit::latest()->first());
//            $view->with('logo',Logo::latest()->first());
//        });
//        view()->composer(['layouts/frontend/master'], function ($view){
//            $view->with('logo',Logo::latest()->first());
//        });

    }
}
