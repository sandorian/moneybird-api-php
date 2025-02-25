<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Api\FinancialStatements;

use Saloon\Http\Response;
use Sandorian\Moneybird\Api\Support\BaseJsonGetRequest;

class GetFinancialStatementRequest extends BaseJsonGetRequest
{
    public function __construct(
        protected readonly string $financialStatementId,
    ) {
        //
    }

    public function resolveEndpoint(): string
    {
        return 'financial_statements/'.$this->financialStatementId;
    }

    public function createDtoFromResponse(Response $response): FinancialStatement
    {
        return FinancialStatement::createFromResponseData($response->json());
    }
}
