<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Api\Documents\GeneralJournalDocuments;

use Saloon\Http\Response;
use Sandorian\Moneybird\Api\Support\BaseJsonPostRequest;
use Sandorian\Moneybird\Api\Support\EncapsulatesData;

class CreateGeneralJournalDocumentAttachmentRequest extends BaseJsonPostRequest
{
    use EncapsulatesData;

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
        return $this->encapsulateData($this->attachmentData);
    }

    /**
     * Get the resource key for encapsulation
     *
     * The Moneybird API requires data to be encapsulated within an 'attachment' key
     */
    protected function getResourceKey(): string
    {
        return 'attachment';
    }
}
