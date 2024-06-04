<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Api\Support;

use Saloon\Enums\Method;
use Saloon\Http\Request;

abstract class BaseJsonGetRequest extends Request
{
    protected Method $method = Method::GET;

    abstract public function resolveEndpoint(): string;
}
