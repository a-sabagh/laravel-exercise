<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Cache;

class CacheActions extends Command
{
    protected $signature = 'app:cache_actions';

    protected $description = 'Command description';

    public function handle()
    {
        /* 
        $minimumPrice = cache()->remember('minimum_price', now()->addHour(), function () {
            sleep(2);

            return 25000;
        });

        $minimumPrice = cache()->rememberForever('minimum_price', function () {
            sleep(2);

            return 25000;
        });

        $this->info($minimumPrice);
        */

        /* 
        cache(['name' => 'Ali']);
        cache()->forever('name', 'Ali');
        */

        /* 
        cache()->put('name', 'Abolfazl', 50);
        cache()->put('famil', 'Sabagh', 50);
        cache()->putMany(
            [
                'name' => 'Abolfazl',
                'famil' => 'Sabagh'
            ],
            50
        );
        cache()->deleteMultiple(['name', 'famil']);
        $n = cache(['name' => 'Reza'], 60);
        $n = cache()->pull('name');
        */

        /* 
        // already exists, must numeric
        cache()->put('83_posts_views', 'foo');
        $res = cache()->increment('83_posts_views');
        $res = cache()->decrement('83_posts_views');
        */

        /* 
        //ttl: int as second, DateTime Interface object, null, Expired date :)
        cache()->put('name', 'Abolfazl', Carbon::yesterday());
        cache()->put('famil', 'Sabagh', Carbon::yesterday());
        cache()->put('foo', '12345', 3);
        cache()->get('foo');
        */

        /* 
        cache()->putMany(
            [
                'post_count' => fake()->randomNumber(),
                'comment_count' => fake()->randomNumber(),
                'view_count' => fake()->randomNumber()
            ],
            300
        );

        cache()->set('post_count', 1100, 300);
        cache()->set('comment_count', 100, 300);
        cache()->set('view_count', 9300, 300);

        [
            'comment_count' => $commentCount
        ] = Cache::many(['post_count', 'comment_count', 'view_count']);
        cache()->getMultiple(['post_count', 'comment_count', 'view_count', 'foo'], 'abcdef')
        */

        /* 
        $res = cache()->add('post_count', 1500, 30);
        cache()->has('post_count')
        $res = cache()->add('comment_count', 95, 60);
        $commentCount = cache()->get('comment_count');
        */
    }
}
