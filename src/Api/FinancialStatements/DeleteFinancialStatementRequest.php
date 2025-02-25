<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Api\FinancialStatements;

use Saloon\Http\Response;
use Sandorian\Moneybird\Api\Support\BaseJsonDeleteRequest;

class DeleteFinancialStatementRequest extends BaseJsonDeleteRequest
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

    public function createDtoFromResponse(Response $response): bool
    {
        return $response->status() === 204;
    }
}
