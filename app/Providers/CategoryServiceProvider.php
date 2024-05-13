<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Category;
use App\Models\Config;
use Illuminate\Support\Facades\Schema;
use App;

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

        if (Schema::hasTable('configs')) {
            
            foreach (Config::all() as  $config) {
                config([$config->key =>  $config->value]);
            }
            App::setLocale(config('app.language'));

        }
        if (Schema::hasTable('categories')) {
            $categories = Category::with(['subcategories:title,category_id,id'])->where('status',1)->get();
            $is_stripe = Config::where('key','setting.stripeKey')->first();
            $is_paypal = Config::where('key','paypal.sandbox.client_id')->orWhere('key','paypal.live.client_id')->first();
            view()->share(['categories'=>$categories,'is_stripe'=>$is_stripe,'is_paypal'=>$is_paypal]);
        }
        
    }
}
