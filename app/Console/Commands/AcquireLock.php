<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class AcquireLock extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:acquire_lock';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create foo lock and acquire';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $lock = cache()->lock('foo', 20);
        
        $lock->acquire();
        $this->info('foo lock acquire with 20 second time limit 🔒');

        $this->table(
            ['Lock Name', 'Lock Owner'],
            [
                [
                    'foo',
                    $lock->owner(),
                ],
            ]
        );

        while (! $lock->get()) {
            sleep(3);

            $this->error(' lock have been acquire  😵‍💫');
        }

        $this->info('Now foo lock has been released from external process 🤩');
    }
}
