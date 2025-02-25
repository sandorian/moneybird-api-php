<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Api\FinancialMutations;

use Saloon\Http\Response;
use Sandorian\Moneybird\Api\Support\BaseJsonGetRequest;

class GetFinancialMutationsRequest extends BaseJsonGetRequest
{
    public function resolveEndpoint(): string
    {
        return 'financial_mutations';
    }

    /**
     * @return array<FinancialMutation>
     */
    public function createDtoFromResponse(Response $response): array
    {
        return array_map(
            fn (array $data) => FinancialMutation::createFromResponseData($data),
            $response->json()
        );
    }
}
