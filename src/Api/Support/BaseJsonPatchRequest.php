<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Api\Support;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

abstract class BaseJsonPatchRequest extends Request implements HasBody
{
    use EncapsulatesData;
    use HasJsonBody;

    protected Method $method = Method::PATCH;

    abstract public function resolveEndpoint(): string;

    /**
     * Set the request body with data encapsulated within the resource key
     */
    public function setEncapsulatedData(array $data): void
    {
        $this->body()->set($this->encapsulateData($data));
    }

    /**
     * Default body data for the request
     * This will be merged with any data provided to the body() method
     */
    protected function defaultBody(): array
    {
        return [];
    }
}
