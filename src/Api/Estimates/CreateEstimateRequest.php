<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Api\Estimates;

use Saloon\Http\Response;
use Sandorian\Moneybird\Api\Support\BaseJsonPostRequest;

class CreateEstimateRequest extends BaseJsonPostRequest
{
    /**
     * @param  array<string, mixed>  $estimateData
     */
    public function __construct(
        protected readonly array $estimateData,
    ) {
        //
    }

    public function resolveEndpoint(): string
    {
        return 'estimates';
    }

    public function createDtoFromResponse(Response $response): Estimate
    {
        return Estimate::createFromResponseData($response->json());
    }

    protected function defaultBody(): array
    {
        return [
            'estimate' => $this->estimateData,
        ];
    }
}
