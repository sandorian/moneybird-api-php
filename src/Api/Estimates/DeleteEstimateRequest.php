<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Api\Estimates;

use Saloon\Http\Response;
use Sandorian\Moneybird\Api\Support\BaseJsonDeleteRequest;

class DeleteEstimateRequest extends BaseJsonDeleteRequest
{
    public function __construct(
        protected readonly string $estimateId,
    ) {
        //
    }

    public function resolveEndpoint(): string
    {
        return 'estimates/'.$this->estimateId;
    }

    public function createDtoFromResponse(Response $response): bool
    {
        return $response->status() === 204;
    }
}
