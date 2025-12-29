<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return cache()->flexible('swv', [5, 15], function () {
        phpinfo();
    });
});
