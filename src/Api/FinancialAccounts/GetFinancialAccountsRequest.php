<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Api\FinancialAccounts;

use Saloon\Http\Response;
use Sandorian\Moneybird\Api\Support\BaseJsonGetRequest;

class GetFinancialAccountsRequest extends BaseJsonGetRequest
{
    public function resolveEndpoint(): string
    {
        return 'financial_accounts';
    }

    /**
     * @return array<FinancialAccount>
     */
    public function createDtoFromResponse(Response $response): array
    {
        return array_map(
            fn (array $data) => FinancialAccount::createFromResponseData($data),
            $response->json()
        );
    }
}
