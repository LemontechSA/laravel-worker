<?php

namespace Standalone\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class DummyJob implements ShouldQueue
{
    use InteractsWithQueue;

    public function handle($data)
    {
        var_dump($data);
    }
}