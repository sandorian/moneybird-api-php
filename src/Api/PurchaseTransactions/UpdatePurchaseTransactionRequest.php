<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Api\PurchaseTransactions;

use Saloon\Http\Response;
use Sandorian\Moneybird\Api\Support\BaseJsonPatchRequest;

class UpdatePurchaseTransactionRequest extends BaseJsonPatchRequest
{
    /**
     * @param  array<string, mixed>  $data
     */
    public function __construct(
        protected readonly string $purchaseTransactionId,
        protected readonly array $data,
    ) {
        //
    }

    public function resolveEndpoint(): string
    {
        return 'purchase_transactions/'.$this->purchaseTransactionId;
    }

    protected function defaultBody(): array
    {
        return [
            'purchase_transaction' => $this->data,
        ];
    }

    public function createDtoFromResponse(Response $response): PurchaseTransaction
    {
        return PurchaseTransaction::createFromResponseData($response->json());
    }
}
