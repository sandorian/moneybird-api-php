<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Api\Documents\GeneralJournalDocuments;

use Saloon\Http\Response;
use Sandorian\Moneybird\Api\Support\BaseJsonPostRequest;

class PostGeneralJournalDocumentsSynchronizationRequest extends BaseJsonPostRequest
{
    /**
     * @param  array<string>  $ids
     */
    public function __construct(
        protected readonly array $ids,
    ) {
        //
    }

    public function resolveEndpoint(): string
    {
        return 'documents/general_journal_documents/synchronization';
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

    protected function defaultBody(): array
    {
        return [
            'ids' => $this->ids,
        ];
    }
}
