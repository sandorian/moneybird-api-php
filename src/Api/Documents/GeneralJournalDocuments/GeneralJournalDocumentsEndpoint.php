<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Api\Documents\GeneralJournalDocuments;

use Saloon\PaginationPlugin\Paginator;
use Sandorian\Moneybird\Api\Support\BaseEndpoint;
use Sandorian\Moneybird\Api\Support\IdVersion;
use Sandorian\Moneybird\Api\Support\MoneybirdPaginator;

class GeneralJournalDocumentsEndpoint extends BaseEndpoint
{
    /**
     * @return Paginator<GeneralJournalDocument>
     */
    public function paginate(): Paginator
    {
        $request = new GetGeneralJournalDocumentsRequest;

        return new MoneybirdPaginator($this->client, $request);
    }

    /**
     * @return array<GeneralJournalDocument>
     */
    public function all(): array
    {
        $request = new GetGeneralJournalDocumentsRequest;

        return $this->client->send($request)->dtoOrFail();
    }

    /**
     * @return array<IdVersion>
     */
    public function synchronization(): array
    {
        $request = new GetGeneralJournalDocumentsSynchronizationRequest;

        return $this->client->send($request)->dtoOrFail();
    }

    /**
     * @param  array<string>  $ids
     * @return array<GeneralJournalDocument>
     */
    public function synchronize(array $ids): array
    {
        $request = new PostGeneralJournalDocumentsSynchronizationRequest($ids);

        return $this->client->send($request)->dtoOrFail();
    }

    public function get(string $generalJournalDocumentId): GeneralJournalDocument
    {
        $request = new GetGeneralJournalDocumentRequest($generalJournalDocumentId);

        return $this->client->send($request)->dtoOrFail();
    }

    /**
     * @param  array<string, mixed>  $generalJournalDocumentData
     */
    public function create(array $generalJournalDocumentData): GeneralJournalDocument
    {
        $request = new CreateGeneralJournalDocumentRequest($generalJournalDocumentData);

        return $this->client->send($request)->dtoOrFail();
    }

    /**
     * @param  array<string, mixed>  $generalJournalDocumentData
     */
    public function update(string $generalJournalDocumentId, array $generalJournalDocumentData): GeneralJournalDocument
    {
        $request = new UpdateGeneralJournalDocumentRequest($generalJournalDocumentId, $generalJournalDocumentData);

        return $this->client->send($request)->dtoOrFail();
    }

    public function delete(string $generalJournalDocumentId): bool
    {
        $request = new DeleteGeneralJournalDocumentRequest($generalJournalDocumentId);

        return $this->client->send($request)->dtoOrFail();
    }

    /**
     * @param  array<string, mixed>  $attachmentData
     */
    public function createAttachment(string $generalJournalDocumentId, array $attachmentData): array
    {
        $request = new CreateGeneralJournalDocumentAttachmentRequest($generalJournalDocumentId, $attachmentData);

        return $this->client->send($request)->dtoOrFail();
    }

    public function deleteAttachment(string $generalJournalDocumentId, string $attachmentId): bool
    {
        $request = new DeleteGeneralJournalDocumentAttachmentRequest($generalJournalDocumentId, $attachmentId);

        return $this->client->send($request)->dtoOrFail();
    }
}
