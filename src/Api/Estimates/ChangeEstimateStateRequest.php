<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Api\Estimates;

use Saloon\Http\Response;
use Sandorian\Moneybird\Api\Support\BaseJsonPatchRequest;

class ChangeEstimateStateRequest extends BaseJsonPatchRequest
{
    public function __construct(
        protected readonly string $estimateId,
        protected readonly string $state,
    ) {
        //
    }

    public function resolveEndpoint(): string
    {
        return 'estimates/'.$this->estimateId.'/change_state/'.$this->state;
    }

    public function createDtoFromResponse(Response $response): Estimate
    {
        return Estimate::createFromResponseData($response->json());
    }
}
