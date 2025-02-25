<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Api\Documents\GeneralDocuments;

use Saloon\Http\Response;
use Sandorian\Moneybird\Api\Support\BaseJsonPostRequest;

class CreateGeneralDocumentAttachmentRequest extends BaseJsonPostRequest
{
    /**
     * @param  array<string, mixed>  $attachmentData
     */
    public function __construct(
        protected readonly string $generalDocumentId,
        protected readonly array $attachmentData,
    ) {
        //
    }

    public function resolveEndpoint(): string
    {
        return 'documents/general_documents/'.$this->generalDocumentId.'/attachments';
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
