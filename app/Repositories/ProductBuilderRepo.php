<?php

namespace App\Repositories;

class ProductBuilderRepo implements ProductRepository
{
    public function getProductCount(): int 
    {
        sleep(3);

        return 1248;
    }
}
