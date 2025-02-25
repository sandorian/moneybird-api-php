<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Api\Documents\Receipts;

use Saloon\PaginationPlugin\Paginator;
use Sandorian\Moneybird\Api\Support\BaseEndpoint;
use Sandorian\Moneybird\Api\Support\IdVersion;
use Sandorian\Moneybird\Api\Support\MoneybirdPaginator;

class ReceiptsEndpoint extends BaseEndpoint
{
    /**
     * @return Paginator<Receipt>
     */
    public function paginate(): Paginator
    {
        $request = new GetReceiptsRequest;

        return new MoneybirdPaginator($this->client, $request);
    }

    /**
     * @return array<Receipt>
     */
    public function all(): array
    {
        $request = new GetReceiptsRequest;

        return $this->client->send($request)->dtoOrFail();
    }

    /**
     * @return array<IdVersion>
     */
    public function synchronization(): array
    {
        $request = new GetReceiptsSynchronizationRequest;

        return $this->client->send($request)->dtoOrFail();
    }

    /**
     * @param  array<string>  $ids
     * @return array<Receipt>
     */
    public function synchronize(array $ids): array
    {
        $request = new PostReceiptsSynchronizationRequest($ids);

        return $this->client->send($request)->dtoOrFail();
    }

    public function get(string $receiptId): Receipt
    {
        $request = new GetReceiptRequest($receiptId);

        return $this->client->send($request)->dtoOrFail();
    }

    /**
     * @param  array<string, mixed>  $receiptData
     */
    public function create(array $receiptData): Receipt
    {
        $request = new CreateReceiptRequest($receiptData);

        return $this->client->send($request)->dtoOrFail();
    }

    /**
     * @param  array<string, mixed>  $receiptData
     */
    public function update(string $receiptId, array $receiptData): Receipt
    {
        $request = new UpdateReceiptRequest($receiptId, $receiptData);

        return $this->client->send($request)->dtoOrFail();
    }

    public function delete(string $receiptId): bool
    {
        $request = new DeleteReceiptRequest($receiptId);

        return $this->client->send($request)->dtoOrFail();
    }

    /**
     * @param  array<string, mixed>  $attachmentData
     */
    public function createAttachment(string $receiptId, array $attachmentData): array
    {
        $request = new CreateReceiptAttachmentRequest($receiptId, $attachmentData);

        return $this->client->send($request)->dtoOrFail();
    }

    public function deleteAttachment(string $receiptId, string $attachmentId): bool
    {
        $request = new DeleteReceiptAttachmentRequest($receiptId, $attachmentId);

        return $this->client->send($request)->dtoOrFail();
    }
}
