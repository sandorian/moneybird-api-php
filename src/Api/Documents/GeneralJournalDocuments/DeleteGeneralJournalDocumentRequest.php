<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Api\Documents\GeneralJournalDocuments;

use Saloon\Http\Response;
use Sandorian\Moneybird\Api\Support\BaseJsonDeleteRequest;

class DeleteGeneralJournalDocumentRequest extends BaseJsonDeleteRequest
{
    public function __construct(
        protected readonly string $generalJournalDocumentId,
    ) {
        //
    }

    public function resolveEndpoint(): string
    {
        return 'documents/general_journal_documents/'.$this->generalJournalDocumentId;
    }

    public function createDtoFromResponse(Response $response): bool
    {
        return $response->status() === 204;
    }
}
