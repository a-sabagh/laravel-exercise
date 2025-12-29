<?php

namespace App\Providers;

use App\Repositories\ProductCacheRepo;
use App\Repositories\ProductRepository;
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
        $this->app->singleton(ProductRepository::class, function () {
            return resolve(ProductCacheRepo::class);
        });

        // Event::listen(function(CacheMissed $event){
        //     Log::info('cache missed: ' . $event->key);
        // });

        // Event::listen(function(KeyWritten $event){
        //     Log::info('cache key written: ' . $event->key);
        // });

        // Event::listen(function(CacheHit $event){
        //     Log::info('cache hit: ' . $event->key);
        // });

        Event::listen('query_hit', function () {
            Log::info('query hit');
        });
    }
}
