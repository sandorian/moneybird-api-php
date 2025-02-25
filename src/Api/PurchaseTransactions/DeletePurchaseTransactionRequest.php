<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Api\PurchaseTransactions;

use Saloon\Http\Response;
use Sandorian\Moneybird\Api\Support\BaseJsonDeleteRequest;

class DeletePurchaseTransactionRequest extends BaseJsonDeleteRequest
{
    public function __construct(
        protected readonly string $purchaseTransactionId,
    ) {
        //
    }

    public function resolveEndpoint(): string
    {
        return 'purchase_transactions/'.$this->purchaseTransactionId;
    }

    public function createDtoFromResponse(Response $response): bool
    {
        return $response->status() === 204;
    }
}
