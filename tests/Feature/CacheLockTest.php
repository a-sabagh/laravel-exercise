<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CacheLockTest extends TestCase
{
    use RefreshDatabase;

    public function test_cach_acquire_atomic_lock(): void
    {
        config()->set('cache.default', 'database');

        $lock = cache()->lock('foo', 10);

        dump('first check: ', $lock->get());
        dump('after second check: ', $lock->get());

        $lock->release();

        dump('after release: ', $lock->get());

        $lock->acquire();

        dump('after acquire: ', $lock->get());

        dd(get_class($lock));

        $this->markTestIncomplete();
    }
}
