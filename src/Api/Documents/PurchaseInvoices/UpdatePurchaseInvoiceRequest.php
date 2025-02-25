<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Api\Documents\PurchaseInvoices;

use Saloon\Http\Response;
use Sandorian\Moneybird\Api\Support\BaseJsonPatchRequest;

class UpdatePurchaseInvoiceRequest extends BaseJsonPatchRequest
{
    /**
     * @param  array<string, mixed>  $purchaseInvoiceData
     */
    public function __construct(
        protected readonly string $purchaseInvoiceId,
        protected readonly array $purchaseInvoiceData,
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

    protected function defaultBody(): array
    {
        return [
            'purchase_invoice' => $this->purchaseInvoiceData,
        ];
    }
}
