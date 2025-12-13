<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class CacheSettingStore extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:cache_setting_store';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // cache()->store('settings')->forever('admin_menus', ['dashboard', 'users']);
        // cache()->store('file')->flush();
        // $m = cache()->store('settings')->get('admin_menus'); //app_settings_admin_menus
        // $store = cache()->store('settings');
        // $store->setPrefix('laravel_exercise_cache_');
        // $r = $store->forget('admin_menus');
        // dd($r);
    }
}
