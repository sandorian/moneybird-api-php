<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Api\Documents\PurchaseInvoices;

use Saloon\Http\Response;
use Sandorian\Moneybird\Api\Support\BaseJsonPostRequest;
use Sandorian\Moneybird\Api\Support\EncapsulatesData;

class CreatePurchaseInvoiceAttachmentRequest extends BaseJsonPostRequest
{
    use EncapsulatesData;

    /**
     * @param  array<string, mixed>  $attachmentData
     */
    public function __construct(
        protected readonly string $purchaseInvoiceId,
        protected readonly array $attachmentData,
    ) {
        //
    }

    public function resolveEndpoint(): string
    {
        return 'documents/purchase_invoices/'.$this->purchaseInvoiceId.'/attachments';
    }

    public function createDtoFromResponse(Response $response): array
    {
        return $response->json();
    }

    /**
     * Get the resource key for encapsulation
     *
     * The Moneybird API requires data to be encapsulated within a 'attachment' key
     */
    protected function getResourceKey(): string
    {
        return 'attachment';
    }

    protected function defaultBody(): array
    {
        return $this->encapsulateData($this->attachmentData);
    }
}
