<?php

namespace App\Console\Commands;

use App\Jobs\ExampleJob as JobsExampleJob;
use Illuminate\Console\Command;

class ExampleJob extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'test:test';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        JobsExampleJob::dispatch(['command' => 'example'])->onQueue('crontab');
        return 0;
    }
}
