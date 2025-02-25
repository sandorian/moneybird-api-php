<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Api\FinancialMutations;

use Saloon\Http\Response;
use Sandorian\Moneybird\Api\Support\BaseJsonGetRequest;

class GetFinancialMutationRequest extends BaseJsonGetRequest
{
    public function __construct(
        protected readonly string $financialMutationId,
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
}
