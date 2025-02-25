<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Api\Documents\PurchaseInvoices;

use Saloon\Http\Response;
use Sandorian\Moneybird\Api\Support\BaseJsonGetRequest;

class GetPurchaseInvoicesRequest extends BaseJsonGetRequest
{
    public function resolveEndpoint(): string
    {
        return 'documents/purchase_invoices';
    }

    /**
     * @return array<PurchaseInvoice>
     */
    public function createDtoFromResponse(Response $response): array
    {
        return array_map(
            fn (array $data) => PurchaseInvoice::createFromResponseData($data),
            $response->json()
        );
    }
}
