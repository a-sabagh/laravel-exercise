<?php

namespace Tests\Unit;

use Tests\TestCase;

class CacheLockTest extends TestCase
{
    public function test_cach_acquire_atomic_lock(): void
    {
        config()->set('cache.default', 'array'); // file, null

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
