<?php

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/log-info', function () {
    defer(function () {
        sleep(5);

        Log::info('hello from apache 2');
    });

    dump('hello');
});

Route::get('post-count', function () {
    return cache()->remember('post_count', 5, function () {
        sleep(2);

        Log::info('revalidate');

        return 2500;
    });
});
