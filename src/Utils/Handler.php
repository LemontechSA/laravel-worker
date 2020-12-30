<?php

namespace Standalone\Utils;

use Illuminate\Contracts\Debug\ExceptionHandler;
use Throwable;

class Handler implements ExceptionHandler
{

    public function report(Throwable $e)
    {
        throw $e;
    }

    public function shouldReport(Throwable $e)
    {
        throw $e;
    }

    public function render($request, Throwable $e)
    {
        throw $e;
    }

    public function renderForConsole($output, Throwable $e)
    {
        throw $e;
    }
}
