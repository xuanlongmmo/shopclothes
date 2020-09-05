<?php

namespace App\Providers;

//Gọi model
use App\large_category_product;
use App\branch;
use App\User;

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
                'data_category'=> large_category_product::all()
            ]);
            // if(Auth::check()){
            //     $view->with([
            //         'user_unique' => User::where('username',Auth::user()->username)->get(),
            //     ]);
            // }
        });
    }
}
