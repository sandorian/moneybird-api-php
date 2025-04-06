<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Api\Documents\GeneralJournalDocuments;

use Saloon\Http\Response;
use Sandorian\Moneybird\Api\Support\BaseJsonPatchRequest;
use Sandorian\Moneybird\Api\Support\EncapsulatesData;

class UpdateGeneralJournalDocumentRequest extends BaseJsonPatchRequest
{
    use EncapsulatesData;

    /**
     * @param  array<string, mixed>  $generalJournalDocumentData
     */
    public function __construct(
        protected readonly string $generalJournalDocumentId,
        protected readonly array $generalJournalDocumentData,
    ) {
        //
    }

    public function resolveEndpoint(): string
    {
        return 'documents/general_journal_documents/'.$this->generalJournalDocumentId;
    }

    public function createDtoFromResponse(Response $response): GeneralJournalDocument
    {
        return GeneralJournalDocument::createFromResponseData($response->json());
    }

    protected function defaultBody(): array
    {
        return $this->encapsulateData($this->generalJournalDocumentData);
    }

    /**
     * Get the resource key for encapsulation
     *
     * The Moneybird API requires data to be encapsulated within a 'general_journal_document' key
     */
    protected function getResourceKey(): string
    {
        return 'general_journal_document';
    }
}
