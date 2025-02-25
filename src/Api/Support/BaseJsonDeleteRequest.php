<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Api\Support;

use Saloon\Enums\Method;
use Saloon\Http\Request;

abstract class BaseJsonDeleteRequest extends Request
{
    protected Method $method = Method::DELETE;

    abstract public function resolveEndpoint(): string;
}
