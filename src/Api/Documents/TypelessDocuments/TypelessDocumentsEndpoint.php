<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Api\Documents\TypelessDocuments;

use Saloon\PaginationPlugin\Paginator;
use Sandorian\Moneybird\Api\Support\BaseEndpoint;
use Sandorian\Moneybird\Api\Support\IdVersion;
use Sandorian\Moneybird\Api\Support\MoneybirdPaginator;

class TypelessDocumentsEndpoint extends BaseEndpoint
{
    /**
     * @return Paginator<TypelessDocument>
     */
    public function paginate(): Paginator
    {
        $request = new GetTypelessDocumentsRequest;

        return new MoneybirdPaginator($this->client, $request);
    }

    /**
     * @return array<TypelessDocument>
     */
    public function all(): array
    {
        $request = new GetTypelessDocumentsRequest;

        return $this->client->send($request)->dtoOrFail();
    }

    /**
     * @return array<IdVersion>
     */
    public function synchronization(): array
    {
        $request = new GetTypelessDocumentsSynchronizationRequest;

        return $this->client->send($request)->dtoOrFail();
    }

    /**
     * @param  array<string>  $ids
     * @return array<TypelessDocument>
     */
    public function synchronize(array $ids): array
    {
        $request = new PostTypelessDocumentsSynchronizationRequest($ids);

        return $this->client->send($request)->dtoOrFail();
    }

    public function get(string $typelessDocumentId): TypelessDocument
    {
        $request = new GetTypelessDocumentRequest($typelessDocumentId);

        return $this->client->send($request)->dtoOrFail();
    }

    /**
     * @param  array<string, mixed>  $typelessDocumentData
     */
    public function create(array $typelessDocumentData): TypelessDocument
    {
        $request = new CreateTypelessDocumentRequest($typelessDocumentData);

        if (method_exists($request, 'setEncapsulatedData')) {
            $request->setEncapsulatedData($typelessDocumentData);
        } else {
            $request->body()->merge($typelessDocumentData);
        }

        return $this->client->send($request)->dtoOrFail();
    }

    /**
     * @param  array<string, mixed>  $typelessDocumentData
     */
    public function update(string $typelessDocumentId, array $typelessDocumentData): TypelessDocument
    {
        $request = new UpdateTypelessDocumentRequest($typelessDocumentId, $typelessDocumentData);

        if (method_exists($request, 'setEncapsulatedData')) {
            $request->setEncapsulatedData($typelessDocumentData);
        } else {
            $request->body()->merge($typelessDocumentData);
        }

        return $this->client->send($request)->dtoOrFail();
    }

    public function delete(string $typelessDocumentId): bool
    {
        $request = new DeleteTypelessDocumentRequest($typelessDocumentId);

        return $this->client->send($request)->dtoOrFail();
    }

    /**
     * @param  array<string, mixed>  $attachmentData
     */
    public function createAttachment(string $typelessDocumentId, array $attachmentData): array
    {
        $request = new CreateTypelessDocumentAttachmentRequest($typelessDocumentId, $attachmentData);

        if (method_exists($request, 'setEncapsulatedData')) {
            $request->setEncapsulatedData($attachmentData);
        } else {
            $request->body()->merge($attachmentData);
        }

        return $this->client->send($request)->dtoOrFail();
    }

    public function deleteAttachment(string $typelessDocumentId, string $attachmentId): bool
    {
        $request = new DeleteTypelessDocumentAttachmentRequest($typelessDocumentId, $attachmentId);

        return $this->client->send($request)->dtoOrFail();
    }
}
