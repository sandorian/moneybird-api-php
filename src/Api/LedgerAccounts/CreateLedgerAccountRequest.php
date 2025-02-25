<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Api\LedgerAccounts;

use Saloon\Http\Response;
use Sandorian\Moneybird\Api\Support\BaseJsonPostRequest;

class CreateLedgerAccountRequest extends BaseJsonPostRequest
{
    /**
     * @param  array<string, mixed>  $data
     */
    public function __construct(
        protected readonly array $data,
    ) {
        //
    }

    public function resolveEndpoint(): string
    {
        return 'ledger_accounts';
    }

    public function createDtoFromResponse(Response $response): LedgerAccount
    {
        return LedgerAccount::createFromResponseData($response->json());
    }

    protected function defaultBody(): array
    {
        return [
            'ledger_account' => $this->data,
        ];
    }
}
