<?php

namespace App\Providers;
use App\Models\Logo;
use Illuminate\Support\ServiceProvider;

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
        $logo = Logo::first();
        // dd($logo);
        view()->share(['logo'=>$logo]);
    }
}
