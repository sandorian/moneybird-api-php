<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Api\LedgerAccounts;

use Saloon\Http\Response;
use Sandorian\Moneybird\Api\Support\BaseJsonGetRequest;

class GetLedgerAccountRequest extends BaseJsonGetRequest
{
    public function __construct(
        protected readonly string $ledgerAccountId,
    ) {
        //
    }

    public function resolveEndpoint(): string
    {
        return 'ledger_accounts/'.$this->ledgerAccountId;
    }

    public function createDtoFromResponse(Response $response): LedgerAccount
    {
        return LedgerAccount::createFromResponseData($response->json());
    }
}
