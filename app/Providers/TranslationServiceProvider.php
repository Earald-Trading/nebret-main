<?php

namespace App\Providers;

use Illuminate\Translation\TranslationServiceProvider as ServiceProvider;
use App\Extended\Translator;

class TranslationServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->registerLoader();
        $this->app->singleton('translator', function ($app) {
            $loader = $app['translation.loader'];
            $locale = $app['config']['app.locale'];
            $trans = new Translator($loader, $locale);
            $trans->setFallback($app['config']['app.fallback_locale']);
            return $trans;
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
