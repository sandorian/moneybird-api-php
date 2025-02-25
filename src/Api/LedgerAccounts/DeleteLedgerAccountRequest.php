<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Api\LedgerAccounts;

use Saloon\Http\Response;
use Sandorian\Moneybird\Api\Support\BaseJsonDeleteRequest;

class DeleteLedgerAccountRequest extends BaseJsonDeleteRequest
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

    public function createDtoFromResponse(Response $response): bool
    {
        return $response->status() === 204;
    }
}
