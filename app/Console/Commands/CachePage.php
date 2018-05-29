<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Logic\Cache\CacheRepository;

class CachePage extends Command
{

    /**  
     * Cache Repository Instance
     * 
     * @var
    */
    protected $cache;
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'blog:cache {type : Type of page to cache}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate cached versions of pages';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(CacheRepository $cacheRepository)
    {
        parent::__construct();
        $this->cache = $cacheRepository;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $type = $this->argument('type');

        $this->cache->storePage($type);
    }
}
