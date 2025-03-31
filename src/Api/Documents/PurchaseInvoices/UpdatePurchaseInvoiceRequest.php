<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Api\Documents\PurchaseInvoices;

use Saloon\Http\Response;
use Sandorian\Moneybird\Api\Support\BaseJsonPatchRequest;
use Sandorian\Moneybird\Api\Support\EncapsulatesData;

class UpdatePurchaseInvoiceRequest extends BaseJsonPatchRequest
{
    use EncapsulatesData;

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

    /**
     * Get the resource key for encapsulation
     *
     * The Moneybird API requires data to be encapsulated within a 'purchase_invoice' key
     */
    protected function getResourceKey(): string
    {
        return 'purchase_invoice';
    }

    protected function defaultBody(): array
    {
        return $this->encapsulateData($this->purchaseInvoiceData);
    }
}
