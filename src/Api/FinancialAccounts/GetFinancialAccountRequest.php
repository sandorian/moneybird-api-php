<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Api\FinancialAccounts;

use Saloon\Http\Response;
use Sandorian\Moneybird\Api\Support\BaseJsonGetRequest;

class GetFinancialAccountRequest extends BaseJsonGetRequest
{
    public function __construct(
        protected readonly string $financialAccountId,
    ) {
        //
    }

    public function resolveEndpoint(): string
    {
        return 'financial_accounts/'.$this->financialAccountId;
    }

    public function createDtoFromResponse(Response $response): FinancialAccount
    {
        return FinancialAccount::createFromResponseData($response->json());
    }
}
