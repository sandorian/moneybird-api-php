<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Api\Documents\GeneralJournalDocuments;

use Saloon\Http\Response;
use Sandorian\Moneybird\Api\Support\BaseJsonPatchRequest;

class UpdateGeneralJournalDocumentRequest extends BaseJsonPatchRequest
{
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
        return [
            'general_journal_document' => $this->generalJournalDocumentData,
        ];
    }
}
