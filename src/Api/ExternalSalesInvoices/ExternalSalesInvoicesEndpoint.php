<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Api\ExternalSalesInvoices;

use Saloon\Http\Response;
use Saloon\PaginationPlugin\Paginator;
use Sandorian\Moneybird\Api\ExternalSalesInvoices\Attachments\ExternalSalesInvoiceAttachmentsEndpoint;
use Sandorian\Moneybird\Api\ExternalSalesInvoices\Payments\ExternalSalesInvoicePaymentsEndpoint;
use Sandorian\Moneybird\Api\Support\BaseEndpoint;

class ExternalSalesInvoicesEndpoint extends BaseEndpoint
{
    public function create(array $data): Response
    {
        $request = new CreateExternalSalesInvoiceRequest();
        $request->body()->merge($data);

        return $this->client->send($request);
    }

    public function paginate(): Paginator
    {
        $request = new GetExternalSalesInvoicesPageRequest;

        return $this->client->paginate($request);
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
