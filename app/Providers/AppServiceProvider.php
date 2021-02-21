<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\ServiceProvider;

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
        //
        Schema::defaultStringLength(191);
        Validator::extend('extension', function ($attribute, $value, $parameters, $validator){
            $validator->addReplacer('strip_param', function($message, $attribute, $rule, $parameters) {
                return str_replace([':param'], implode(', ', $parameters), $message);
            });
            return in_array(pathinfo($value, PATHINFO_EXTENSION), $parameters);
        });

        Paginator::useBootstrap();
    }
}
