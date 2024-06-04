<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Api\Support;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

abstract class BaseJsonPostRequest extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    abstract public function resolveEndpoint(): string;
}
