<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Api\Estimates;

use Saloon\Http\Response;
use Sandorian\Moneybird\Api\Support\BaseJsonPostRequest;

class DuplicateEstimateRequest extends BaseJsonPostRequest
{
    public function __construct(
        protected readonly string $estimateId,
    ) {
        //
    }

    public function resolveEndpoint(): string
    {
        return 'estimates/'.$this->estimateId.'/duplicate';
    }

    public function createDtoFromResponse(Response $response): Estimate
    {
        return Estimate::createFromResponseData($response->json());
    }
}
