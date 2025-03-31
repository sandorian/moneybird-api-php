<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Api\FinancialMutations;

use Saloon\Http\Response;
use Sandorian\Moneybird\Api\Support\BaseJsonPatchRequest;
use Sandorian\Moneybird\Api\Support\EncapsulatesData;

class UpdateFinancialMutationRequest extends BaseJsonPatchRequest
{
    use EncapsulatesData;

    /**
     * @param  array<string, mixed>  $data
     */
    public function __construct(
        protected readonly string $financialMutationId,
        protected readonly array $data,
    ) {
        //
    }

    public function resolveEndpoint(): string
    {
        return 'financial_mutations/'.$this->financialMutationId;
    }

    public function createDtoFromResponse(Response $response): FinancialMutation
    {
        return FinancialMutation::createFromResponseData($response->json());
    }

    protected function defaultBody(): array
    {
        return $this->encapsulateData($this->data);
    }

    /**
     * Get the resource key for encapsulation
     *
     * The Moneybird API requires data to be encapsulated within a 'financial_mutation' key
     */
    protected function getResourceKey(): string
    {
        return 'financial_mutation';
    }
}
