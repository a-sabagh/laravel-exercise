<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Contracts\Cache\LockTimeoutException;

class HeavyProcess extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:heavy_process';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    private function query()
    {
        return cache()->remember('hp_result', 10, function(){
            // while(true) {
            //     sleep(5);
            // }
            sleep(5);

            return 1400;
        });
    }

    /**
     * Execute the console command.
     */
    public function handle()
    {
        try {
            cache()->lock('hp_lock')->block(10, function() {
                $res = $this->query();
        
                $this->info($res);
            });
        } catch(LockTimeoutException $e) {
            $this->error(get_class($e));
        }
    }
}
