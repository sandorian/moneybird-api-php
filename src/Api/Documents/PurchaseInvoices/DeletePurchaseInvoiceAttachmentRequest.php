<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Api\Documents\PurchaseInvoices;

use Saloon\Http\Response;
use Sandorian\Moneybird\Api\Support\BaseJsonDeleteRequest;

class DeletePurchaseInvoiceAttachmentRequest extends BaseJsonDeleteRequest
{
    public function __construct(
        protected readonly string $purchaseInvoiceId,
        protected readonly string $attachmentId,
    ) {
        //
    }

    public function resolveEndpoint(): string
    {
        return 'documents/purchase_invoices/'.$this->purchaseInvoiceId.'/attachments/'.$this->attachmentId;
    }

    public function createDtoFromResponse(Response $response): bool
    {
        return $response->status() === 204;
    }
}
