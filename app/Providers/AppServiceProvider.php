<?php

namespace App\Providers;

use Illuminate\Cache\Events\CacheHit;
use Illuminate\Cache\Events\CacheMissed;
use Illuminate\Cache\Events\KeyWritten;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Event::listen(function(CacheMissed $event){
            Log::info('cache missed: ' . $event->key);
        });

        Event::listen(function(KeyWritten $event){
            Log::info('cache key written: ' . $event->key);
        });

        Event::listen(function(CacheHit $event){
            Log::info('cache hit: ' . $event->key);
        });
    }
}
