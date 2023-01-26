<?php

namespace App\Exceptions;

use Whoops\Handler\PrettyPageHandler;
use Whoops\Run;

class PrettyExceptionHandler
{
    /**
     * Constructor
     */
    public function __construct(){}

    /**
     * Handle Exceptions and make it pretty look
     * @retrun void
     */
    public static function handle()
    {
        $whoops = new Run();
        $whoops->pushHandler(new PrettyPageHandler());
        $whoops->register();
    }

}