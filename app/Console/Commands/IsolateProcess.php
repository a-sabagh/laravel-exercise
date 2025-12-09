<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class IsolateProcess extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:isolate_process';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    private function query(): bool
    {
        sleep(6);

        return true;
    }

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $lock = cache()->lock('isolate_proc', 10);

        // if ($lock->get()) {
        //     $this->query();

        //     $this->info('Isolate query implement');

        //     $lock->release();
        // } else {
        //     $this->warn('Lock has been acquired');
        // }

        $lockGetResult = $lock->get(function(){
            $queryResult = $this->query();

            $this->info('Isolate query implement');

            return $queryResult;
        });

        if(false === $lockGetResult) {
            $this->warn('Lock has been acquired');
        }
    }
}
