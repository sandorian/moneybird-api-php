<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Api\Documents\GeneralJournalDocuments;

use Saloon\Http\Response;
use Sandorian\Moneybird\Api\Support\BaseJsonGetRequest;

class GetGeneralJournalDocumentsRequest extends BaseJsonGetRequest
{
    public function resolveEndpoint(): string
    {
        return 'documents/general_journal_documents';
    }

    /**
     * @return array<GeneralJournalDocument>
     */
    public function createDtoFromResponse(Response $response): array
    {
        return array_map(
            fn (array $data) => GeneralJournalDocument::createFromResponseData($data),
            $response->json()
        );
    }
}
