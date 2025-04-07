<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Api\Documents\PurchaseInvoices;

use Saloon\PaginationPlugin\Paginator;
use Sandorian\Moneybird\Api\Support\BaseEndpoint;
use Sandorian\Moneybird\Api\Support\IdVersion;
use Sandorian\Moneybird\Api\Support\MoneybirdPaginator;

class PurchaseInvoicesEndpoint extends BaseEndpoint
{
    /**
     * @return Paginator<PurchaseInvoice>
     */
    public function paginate(): Paginator
    {
        $request = new GetPurchaseInvoicesRequest;

        return new MoneybirdPaginator($this->client, $request);
    }

    /**
     * @return array<PurchaseInvoice>
     */
    public function all(): array
    {
        $request = new GetPurchaseInvoicesRequest;

        return $this->client->send($request)->dtoOrFail();
    }

    /**
     * @return array<IdVersion>
     */
    public function synchronization(): array
    {
        $request = new GetPurchaseInvoicesSynchronizationRequest;

        return $this->client->send($request)->dtoOrFail();
    }

    /**
     * @param  array<string>  $ids
     * @return array<PurchaseInvoice>
     */
    public function synchronize(array $ids): array
    {
        $request = new PostPurchaseInvoicesSynchronizationRequest($ids);

        return $this->client->send($request)->dtoOrFail();
    }

    public function get(string $purchaseInvoiceId): PurchaseInvoice
    {
        $request = new GetPurchaseInvoiceRequest($purchaseInvoiceId);

        return $this->client->send($request)->dtoOrFail();
    }

    /**
     * @param  array<string, mixed>  $purchaseInvoiceData
     */
    public function create(array $purchaseInvoiceData): PurchaseInvoice
    {
        $request = new CreatePurchaseInvoiceRequest($purchaseInvoiceData);

        return $this->client->send($request)->dtoOrFail();
    }

    /**
     * @param  array<string, mixed>  $purchaseInvoiceData
     */
    public function update(string $purchaseInvoiceId, array $purchaseInvoiceData): PurchaseInvoice
    {
        $request = new UpdatePurchaseInvoiceRequest($purchaseInvoiceId, $purchaseInvoiceData);

        return $this->client->send($request)->dtoOrFail();
    }

    public function delete(string $purchaseInvoiceId): bool
    {
        $request = new DeletePurchaseInvoiceRequest($purchaseInvoiceId);

        return $this->client->send($request)->dtoOrFail();
    }

    /**
     * @param  array<string, mixed>  $attachmentData
     */
    public function createAttachment(string $purchaseInvoiceId, array $attachmentData): array
    {
        $request = new CreatePurchaseInvoiceAttachmentRequest($purchaseInvoiceId, $attachmentData);

        return $this->client->send($request)->dtoOrFail();
    }

    public function deleteAttachment(string $purchaseInvoiceId, string $attachmentId): bool
    {
        $request = new DeletePurchaseInvoiceAttachmentRequest($purchaseInvoiceId, $attachmentId);

        return $this->client->send($request)->dtoOrFail();
    }
}
