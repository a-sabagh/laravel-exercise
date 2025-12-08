<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

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
            sleep(5);

            return 1400;
        });
    }

    /**
     * Execute the console command.
     */
    public function handle()
    {
        cache()->lock('hp_lock')->block(10, function() {
            $res = $this->query();
    
            $this->info($res);
        });
    }
}
