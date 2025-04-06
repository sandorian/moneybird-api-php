<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Api\Estimates;

use Saloon\Http\Response;
use Sandorian\Moneybird\Api\Support\BaseJsonPostRequest;
use Sandorian\Moneybird\Api\Support\EncapsulatesData;

class CreateEstimateRequest extends BaseJsonPostRequest
{
    use EncapsulatesData;

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
        return $this->encapsulateData($this->estimateData);
    }

    /**
     * Get the resource key for encapsulation
     *
     * The Moneybird API requires data to be encapsulated within an 'estimate' key
     */
    protected function getResourceKey(): string
    {
        return 'estimate';
    }
}
