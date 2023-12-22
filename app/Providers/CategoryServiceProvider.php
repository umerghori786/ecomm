<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Category;
use App\Models\Config;

class CategoryServiceProvider extends ServiceProvider
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
        $categories = Category::with(['subcategories:title,category_id,id'])->get();
        
        $check_currency = Config::where('key','app.currency')->first();
        if(isset($check_currency))
        {
            config([$check_currency->key =>  $check_currency->value]);
        }
        $check_appname = Config::where('key','app.name')->first();
        if(isset($check_appname))
        {
            config([$check_appname->key =>  $check_appname->value]);
        }

        view()->share(['categories'=>$categories]);
    }
}
