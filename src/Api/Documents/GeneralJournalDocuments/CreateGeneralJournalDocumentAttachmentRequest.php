<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Api\Documents\GeneralJournalDocuments;

use Saloon\Http\Response;
use Sandorian\Moneybird\Api\Support\BaseJsonPostRequest;

class CreateGeneralJournalDocumentAttachmentRequest extends BaseJsonPostRequest
{
    /**
     * @param  array<string, mixed>  $attachmentData
     */
    public function __construct(
        protected readonly string $generalJournalDocumentId,
        protected readonly array $attachmentData,
    ) {
        //
    }

    public function resolveEndpoint(): string
    {
        return 'documents/general_journal_documents/'.$this->generalJournalDocumentId.'/attachments';
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
