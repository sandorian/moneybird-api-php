<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Api\Documents\TypelessDocuments;

use Saloon\Http\Response;
use Sandorian\Moneybird\Api\Support\BaseJsonPostRequest;

class CreateTypelessDocumentAttachmentRequest extends BaseJsonPostRequest
{
    /**
     * @param  array<string, mixed>  $attachmentData
     */
    public function __construct(
        protected readonly string $typelessDocumentId,
        protected readonly array $attachmentData,
    ) {
        //
    }

    public function resolveEndpoint(): string
    {
        return 'documents/typeless_documents/'.$this->typelessDocumentId.'/attachments';
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
