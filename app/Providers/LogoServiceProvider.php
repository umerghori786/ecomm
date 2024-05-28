<?php

namespace App\Providers;
use App\Models\Logo;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class LogoServiceProvider extends ServiceProvider
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
        if (Schema::hasTable('logos')) {

            $logo = Logo::first();
            view()->share(['logo'=>$logo]);
        }
        
    }
}
