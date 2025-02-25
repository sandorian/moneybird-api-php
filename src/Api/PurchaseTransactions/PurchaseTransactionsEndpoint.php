<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Api\PurchaseTransactions;

use Saloon\PaginationPlugin\Paginator;
use Sandorian\Moneybird\Api\Support\BaseEndpoint;
use Sandorian\Moneybird\Api\Support\MoneybirdPaginator;

class PurchaseTransactionsEndpoint extends BaseEndpoint
{
    /**
     * @return Paginator<PurchaseTransaction>
     */
    public function paginate(): Paginator
    {
        $request = new GetPurchaseTransactionsRequest;

        return new MoneybirdPaginator($this->client, $request);
    }

    /**
     * @return array<PurchaseTransaction>
     */
    public function all(): array
    {
        $request = new GetPurchaseTransactionsRequest;

        return $this->client->send($request)->dtoOrFail();
    }

    public function get(string $purchaseTransactionId): PurchaseTransaction
    {
        $request = new GetPurchaseTransactionRequest($purchaseTransactionId);

        return $this->client->send($request)->dtoOrFail();
    }

    /**
     * @param  array<string, mixed>  $data
     */
    public function create(array $data): PurchaseTransaction
    {
        $request = new CreatePurchaseTransactionRequest($data);

        return $this->client->send($request)->dtoOrFail();
    }

    /**
     * @param  array<string, mixed>  $data
     */
    public function update(string $purchaseTransactionId, array $data): PurchaseTransaction
    {
        $request = new UpdatePurchaseTransactionRequest($purchaseTransactionId, $data);

        return $this->client->send($request)->dtoOrFail();
    }

    public function delete(string $purchaseTransactionId): bool
    {
        $request = new DeletePurchaseTransactionRequest($purchaseTransactionId);

        return $this->client->send($request)->dtoOrFail();
    }
}
