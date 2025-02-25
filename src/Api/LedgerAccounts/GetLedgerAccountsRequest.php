<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Api\LedgerAccounts;

use Saloon\Http\Response;
use Sandorian\Moneybird\Api\Support\BaseJsonGetRequest;

class GetLedgerAccountsRequest extends BaseJsonGetRequest
{
    public function resolveEndpoint(): string
    {
        return 'ledger_accounts';
    }

    /**
     * @return array<LedgerAccount>
     */
    public function createDtoFromResponse(Response $response): array
    {
        return array_map(
            fn (array $data) => LedgerAccount::createFromResponseData($data),
            $response->json()
        );
    }
}
