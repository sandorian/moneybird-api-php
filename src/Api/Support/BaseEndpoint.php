<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Api\Support;

use Sandorian\Moneybird\Api\MoneybirdApiClient;

abstract class BaseEndpoint
{
    public function __construct(
        protected readonly MoneybirdApiClient $client
    ) {
        //
    }
}
