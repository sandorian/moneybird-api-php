<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Api\Documents\PurchaseInvoices;

use Saloon\Http\Response;
use Sandorian\Moneybird\Api\Support\BaseJsonPostRequest;

class CreatePurchaseInvoiceAttachmentRequest extends BaseJsonPostRequest
{
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

    protected function defaultBody(): array
    {
        return [
            'attachment' => $this->attachmentData,
        ];
    }
}
