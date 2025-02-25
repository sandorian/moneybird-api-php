<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Api\FinancialMutations;

use Saloon\Http\Response;
use Sandorian\Moneybird\Api\Support\BaseJsonPatchRequest;

class UpdateFinancialMutationRequest extends BaseJsonPatchRequest
{
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
        return [
            'financial_mutation' => $this->data,
        ];
    }
}
