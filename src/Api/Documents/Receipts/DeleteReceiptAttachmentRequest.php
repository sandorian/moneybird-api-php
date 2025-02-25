<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Api\Documents\Receipts;

use Saloon\Http\Response;
use Sandorian\Moneybird\Api\Support\BaseJsonDeleteRequest;

class DeleteReceiptAttachmentRequest extends BaseJsonDeleteRequest
{
    public function __construct(
        protected readonly string $receiptId,
        protected readonly string $attachmentId,
    ) {
        //
    }

    public function resolveEndpoint(): string
    {
        return 'documents/receipts/'.$this->receiptId.'/attachments/'.$this->attachmentId;
    }

    public function createDtoFromResponse(Response $response): bool
    {
        return $response->status() === 204;
    }
}
