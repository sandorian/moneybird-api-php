<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Api\LedgerAccounts;

use Saloon\PaginationPlugin\Paginator;
use Sandorian\Moneybird\Api\Support\BaseEndpoint;
use Sandorian\Moneybird\Api\Support\MoneybirdPaginator;

class LedgerAccountsEndpoint extends BaseEndpoint
{
    /**
     * @return Paginator<LedgerAccount>
     */
    public function paginate(): Paginator
    {
        $request = new GetLedgerAccountsRequest;

        return new MoneybirdPaginator($this->client, $request);
    }

    /**
     * @return array<LedgerAccount>
     */
    public function all(): array
    {
        $request = new GetLedgerAccountsRequest;

        return $this->client->send($request)->dtoOrFail();
    }

    public function get(string $ledgerAccountId): LedgerAccount
    {
        $request = new GetLedgerAccountRequest($ledgerAccountId);

        return $this->client->send($request)->dtoOrFail();
    }

    /**
     * @param  array<string, mixed>  $data
     */
    public function create(array $data): LedgerAccount
    {
        $request = new CreateLedgerAccountRequest($data);
        if (method_exists($request, 'setEncapsulatedData')) {
            $request->setEncapsulatedData($data);
        }

        return $this->client->send($request)->dtoOrFail();
    }

    /**
     * @param  array<string, mixed>  $data
     */
    public function update(string $ledgerAccountId, array $data): LedgerAccount
    {
        $request = new UpdateLedgerAccountRequest($ledgerAccountId, $data);
        if (method_exists($request, 'setEncapsulatedData')) {
            $request->setEncapsulatedData($data);
        }

        return $this->client->send($request)->dtoOrFail();
    }

    public function delete(string $ledgerAccountId): bool
    {
        $request = new DeleteLedgerAccountRequest($ledgerAccountId);

        return $this->client->send($request)->dtoOrFail();
    }
}
