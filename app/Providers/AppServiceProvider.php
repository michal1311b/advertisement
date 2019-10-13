<?php

namespace App\Providers;

<<<<<<< HEAD
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
=======
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use App\Observers\PostObserver;
use App\Advertisement;
>>>>>>> bc873478dff7e481546a5007b9d26a7222a94c2f

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
<<<<<<< HEAD
        //
=======
        Schema::defaultStringLength(191);
>>>>>>> bc873478dff7e481546a5007b9d26a7222a94c2f
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
<<<<<<< HEAD
        Schema::defaultStringLength(191);
=======
        Advertisement::observe(PostObserver::class);
>>>>>>> bc873478dff7e481546a5007b9d26a7222a94c2f
    }
}
