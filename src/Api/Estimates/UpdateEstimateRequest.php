<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Api\Estimates;

use Saloon\Http\Response;
use Sandorian\Moneybird\Api\Support\BaseJsonPatchRequest;
use Sandorian\Moneybird\Api\Support\EncapsulatesData;

class UpdateEstimateRequest extends BaseJsonPatchRequest
{
    use EncapsulatesData;

    /**
     * @param  array<string, mixed>  $estimateData
     */
    public function __construct(
        protected readonly string $estimateId,
        protected readonly array $estimateData,
    ) {
        //
    }

    public function resolveEndpoint(): string
    {
        return 'estimates/'.$this->estimateId;
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
