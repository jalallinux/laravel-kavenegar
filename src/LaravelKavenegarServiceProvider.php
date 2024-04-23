<?php

namespace JalalLinuX\Kavenegar;

use Illuminate\Support\ServiceProvider;

class LaravelKavenegarServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__.'/../config/kavenegar.php', 'kavenegar');
    }

    public function boot(): void
    {
        $this->registerCommands();
        $this->registerPublishing();
        $this->registerBindings();
        $this->registerTranslations();
    }

    protected function registerPublishing(): void
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../config/kavenegar.php' => config_path('kavenegar.php'),
            ], 'config');

            $this->publishes([
                __DIR__.'/../lang' => lang_path('vendor/laravel-kavenegar'),
            ], 'lang');
        }
    }

    protected function registerCommands(): void
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                //
            ]);
        }
    }

    public function registerBindings(): void
    {
        /** Register Helper function class */
    }

    public function registerTranslations(): void
    {
        $this->loadTranslationsFrom(__DIR__.'/../lang', 'kavenegar');
    }
}
