<?php

declare(strict_types=1);

use Symfony\Component\VarDumper\VarDumper;

if (! function_exists('dd')) {
    function dd(...$args)
    {
        foreach ($args as $arg) {
            VarDumper::dump($arg);
        }
        exit(1);
    }
}
