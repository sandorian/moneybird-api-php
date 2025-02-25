<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Api\PurchaseTransactions;

use Saloon\Http\Response;
use Sandorian\Moneybird\Api\Support\BaseJsonGetRequest;

class GetPurchaseTransactionsRequest extends BaseJsonGetRequest
{
    public function resolveEndpoint(): string
    {
        return 'purchase_transactions';
    }

    /**
     * @return array<PurchaseTransaction>
     */
    public function createDtoFromResponse(Response $response): array
    {
        return array_map(
            fn (array $data) => PurchaseTransaction::createFromResponseData($data),
            $response->json()
        );
    }
}
