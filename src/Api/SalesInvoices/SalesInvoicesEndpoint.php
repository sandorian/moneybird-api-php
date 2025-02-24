<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Api\SalesInvoices;

use Saloon\PaginationPlugin\Paginator;
use Sandorian\Moneybird\Api\SalesInvoices\Payments\SalesInvoicePaymentsEndpoint;
use Sandorian\Moneybird\Api\Support\BaseEndpoint;

class SalesInvoicesEndpoint extends BaseEndpoint
{
    public function create(array $data): SalesInvoice
    {
        $request = new CreateSalesInvoiceRequest;
        $request->body()->merge($data);
        $response = $this->client->send($request);

        return $request->createDtoFromResponse($response);
    }

    public function get(string $id): SalesInvoice
    {
        $request = new GetSalesInvoiceRequest($id);
        $response = $this->client->send($request);

        return $request->createDtoFromResponse($response);
    }

    public function findByInvoiceId(string $invoiceId): SalesInvoice
    {
        $request = new FindSalesInvoiceByInvoiceIdRequest($invoiceId);
        $response = $this->client->send($request);

        return $request->createDtoFromResponse($response);
    }

    public function findByReference(string $reference): SalesInvoice
    {
        $request = new FindSalesInvoiceByReferenceRequest($reference);
        $response = $this->client->send($request);

        return $request->createDtoFromResponse($response);
    }

    public function paginate(): Paginator
    {
        $request = new GetSalesInvoicesPageRequest();

        return $this->client->paginate($request);
    }

    public function payments(): SalesInvoicePaymentsEndpoint
    {
        return new SalesInvoicePaymentsEndpoint($this->client);
    }
}
