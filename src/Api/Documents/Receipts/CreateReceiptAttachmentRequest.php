<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Api\Documents\Receipts;

use Saloon\Http\Response;
use Sandorian\Moneybird\Api\Support\BaseJsonPostRequest;

class CreateReceiptAttachmentRequest extends BaseJsonPostRequest
{
    /**
     * @param  array<string, mixed>  $attachmentData
     */
    public function __construct(
        protected readonly string $receiptId,
        protected readonly array $attachmentData,
    ) {
        //
    }

    public function resolveEndpoint(): string
    {
        return 'documents/receipts/'.$this->receiptId.'/attachments';
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
