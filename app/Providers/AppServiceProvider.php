<?php

namespace App\Providers;

//Gọi model
use App\category_product;
use App\branch;
use App\User;
use App\category_news;
use App\contact;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Auth;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('*',function($view){
            $view->with([
                'data_unique'=> branch::all(),
                'data_category'=> category_product::where('status',1)->get(),
                'data_category_news'=> category_news::where('status',1)->get(),
                'data_messeger'=> contact::where('status',0)->get(),
            ]);
        });
    }
}
