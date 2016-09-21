<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Http\Support\Contracts\StorageInterface;
use App\Http\Support\SessionStorage;
use App\Http\Model\Item;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('item',function($app){
            return new Item;
        });
        $this->app->bind('basket',function($app){
            return new Basket;
        });
        $this->app->bind('App\Http\Support\Contracts\StorageInterface','App\Http\Support\SessionStorage');
    }
}
