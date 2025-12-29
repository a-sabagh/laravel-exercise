<?php

namespace App\Repositories;

class ProductCacheRepo implements ProductRepository
{
    public function __construct(
        public ProductBuilderRepo $repo
    ) {}

    public function getProductCount(): int
    {
        $key = 'product.count';
        $ttl = now()->addDay();
        $clb = fn () => $this->repo->getProductCount();

        return cache()->remember($key, $ttl, $clb);
    }
}
