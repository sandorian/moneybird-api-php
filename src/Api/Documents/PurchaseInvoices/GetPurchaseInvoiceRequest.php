<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Api\Documents\PurchaseInvoices;

use Saloon\Http\Response;
use Sandorian\Moneybird\Api\Support\BaseJsonGetRequest;

class GetPurchaseInvoiceRequest extends BaseJsonGetRequest
{
    public function __construct(
        protected readonly string $purchaseInvoiceId,
    ) {
        //
    }

    public function resolveEndpoint(): string
    {
        return 'documents/purchase_invoices/'.$this->purchaseInvoiceId;
    }

    public function createDtoFromResponse(Response $response): PurchaseInvoice
    {
        return PurchaseInvoice::createFromResponseData($response->json());
    }
}
