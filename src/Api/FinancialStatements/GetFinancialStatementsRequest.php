<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Api\FinancialStatements;

use Saloon\Http\Response;
use Sandorian\Moneybird\Api\Support\BaseJsonGetRequest;

class GetFinancialStatementsRequest extends BaseJsonGetRequest
{
    public function resolveEndpoint(): string
    {
        return 'financial_statements';
    }

    /**
     * @return array<FinancialStatement>
     */
    public function createDtoFromResponse(Response $response): array
    {
        return array_map(
            fn (array $data) => FinancialStatement::createFromResponseData($data),
            $response->json()
        );
    }
}
