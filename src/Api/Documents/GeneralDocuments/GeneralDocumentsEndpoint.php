<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Api\Documents\GeneralDocuments;

use Saloon\PaginationPlugin\Paginator;
use Sandorian\Moneybird\Api\Support\BaseEndpoint;
use Sandorian\Moneybird\Api\Support\IdVersion;
use Sandorian\Moneybird\Api\Support\MoneybirdPaginator;

class GeneralDocumentsEndpoint extends BaseEndpoint
{
    /**
     * @return Paginator<GeneralDocument>
     */
    public function paginate(): Paginator
    {
        $request = new GetGeneralDocumentsRequest;

        return new MoneybirdPaginator($this->client, $request);
    }

    /**
     * @return array<GeneralDocument>
     */
    public function all(): array
    {
        $request = new GetGeneralDocumentsRequest;

        return $this->client->send($request)->dtoOrFail();
    }

    /**
     * @return array<IdVersion>
     */
    public function synchronization(): array
    {
        $request = new GetGeneralDocumentsSynchronizationRequest;

        return $this->client->send($request)->dtoOrFail();
    }

    /**
     * @param  array<string>  $ids
     * @return array<GeneralDocument>
     */
    public function synchronize(array $ids): array
    {
        $request = new PostGeneralDocumentsSynchronizationRequest($ids);

        return $this->client->send($request)->dtoOrFail();
    }

    public function get(string $generalDocumentId): GeneralDocument
    {
        $request = new GetGeneralDocumentRequest($generalDocumentId);

        return $this->client->send($request)->dtoOrFail();
    }

    /**
     * @param  array<string, mixed>  $generalDocumentData
     */
    public function create(array $generalDocumentData): GeneralDocument
    {
        $request = new CreateGeneralDocumentRequest($generalDocumentData);

        return $this->client->send($request)->dtoOrFail();
    }

    /**
     * @param  array<string, mixed>  $generalDocumentData
     */
    public function update(string $generalDocumentId, array $generalDocumentData): GeneralDocument
    {
        $request = new UpdateGeneralDocumentRequest($generalDocumentId, $generalDocumentData);

        return $this->client->send($request)->dtoOrFail();
    }

    public function delete(string $generalDocumentId): bool
    {
        $request = new DeleteGeneralDocumentRequest($generalDocumentId);

        return $this->client->send($request)->dtoOrFail();
    }

    /**
     * @param  array<string, mixed>  $attachmentData
     */
    public function createAttachment(string $generalDocumentId, array $attachmentData): array
    {
        $request = new CreateGeneralDocumentAttachmentRequest($generalDocumentId, $attachmentData);

        return $this->client->send($request)->dtoOrFail();
    }

    public function deleteAttachment(string $generalDocumentId, string $attachmentId): bool
    {
        $request = new DeleteGeneralDocumentAttachmentRequest($generalDocumentId, $attachmentId);

        return $this->client->send($request)->dtoOrFail();
    }
}
