<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Api\FinancialStatements;

use Saloon\Http\Response;
use Sandorian\Moneybird\Api\Support\BaseJsonPatchRequest;

class UpdateFinancialStatementRequest extends BaseJsonPatchRequest
{
    /**
     * @param  array<string, mixed>  $data
     */
    public function __construct(
        protected readonly string $financialStatementId,
        protected readonly array $data,
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

    protected function defaultBody(): array
    {
        return [
            'financial_statement' => $this->data,
        ];
    }
}
