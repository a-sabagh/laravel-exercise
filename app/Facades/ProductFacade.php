<?php

namespace App\Facades;

use App\Repositories\ProductRepository;
use Illuminate\Support\Facades\Facade;

class ProductFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return ProductRepository::class;
    }
}
