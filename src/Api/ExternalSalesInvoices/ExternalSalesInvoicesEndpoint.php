<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Api\ExternalSalesInvoices;

use Saloon\PaginationPlugin\Paginator;
use Sandorian\Moneybird\Api\ExternalSalesInvoices\Attachments\ExternalSalesInvoiceAttachmentsEndpoint;
use Sandorian\Moneybird\Api\ExternalSalesInvoices\Payments\ExternalSalesInvoicePaymentsEndpoint;
use Sandorian\Moneybird\Api\Support\BaseEndpoint;

class ExternalSalesInvoicesEndpoint extends BaseEndpoint
{
    public function create(array $data): ExternalSalesInvoice
    {
        $request = new CreateExternalSalesInvoiceRequest($data);

        return $this->client->send($request)->dtoOrFail();
    }

    public function paginate(): Paginator
    {
        $request = new GetExternalSalesInvoicesPageRequest;

        return $this->client->paginate($request);
    }

    public function get(string $id): ExternalSalesInvoice
    {
        $request = new GetExternalSalesInvoiceRequest($id);

        return $this->client->send($request)->dtoOrFail();
    }

    public function update(string $id, array $data): ExternalSalesInvoice
    {
        $request = new UpdateExternalSalesInvoiceRequest($id, $data);

        return $this->client->send($request)->dtoOrFail();
    }

    public function delete(string $id): void
    {
        $request = new DeleteExternalSalesInvoiceRequest($id);

        $this->client->send($request);
    }

    public function getSynchronization(): array
    {
        $request = new GetExternalSalesInvoicesSynchronizationRequest;

        return $this->client->send($request)->json();
    }

    public function synchronize(array $ids): array
    {
        $request = new SynchronizeExternalSalesInvoicesRequest;
        $request->body()->merge(['ids' => $ids]);

        return $this->client->send($request)->json();
    }

    public function attachments(): ExternalSalesInvoiceAttachmentsEndpoint
    {
        return new ExternalSalesInvoiceAttachmentsEndpoint($this->client);
    }

    public function payments(): ExternalSalesInvoicePaymentsEndpoint
    {
        return new ExternalSalesInvoicePaymentsEndpoint($this->client);
    }
}
