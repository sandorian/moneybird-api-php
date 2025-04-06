<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Api\FinancialStatements;

use Saloon\Http\Response;
use Sandorian\Moneybird\Api\Support\BaseJsonPatchRequest;
use Sandorian\Moneybird\Api\Support\EncapsulatesData;

class UpdateFinancialStatementRequest extends BaseJsonPatchRequest
{
    use EncapsulatesData;

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
        return $this->encapsulateData($this->data);
    }

    /**
     * Get the resource key for encapsulation
     *
     * The Moneybird API requires data to be encapsulated within a 'financial_statement' key
     */
    protected function getResourceKey(): string
    {
        return 'financial_statement';
    }
}
