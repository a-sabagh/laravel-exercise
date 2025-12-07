<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class ReleaseLock extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:release_lock {owner}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Foo process based on foo lock';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $owner = $this->argument('owner');

        cache()->restoreLock('foo', $owner)->release();

        $this->info("lock is released 🔐");
    }
}
