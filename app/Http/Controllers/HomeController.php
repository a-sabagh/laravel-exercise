<?php

namespace App\Http\Controllers;

use App\Repositories\ProductRepository;

class HomeController
{
    public function index(ProductRepository $repo): int
    {
        return $repo->getProductCount();
    }
}
