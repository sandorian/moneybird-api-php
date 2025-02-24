<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Api\SalesInvoices;


use Saloon\Http\Response;
use Sandorian\Moneybird\Api\Support\BaseJsonGetRequest;

class FindSalesInvoiceByInvoiceIdRequest extends BaseJsonGetRequest
{
    public function __construct(
        protected readonly string $invoiceId,
    ) {
        //
    }

    public function resolveEndpoint(): string
    {
        return 'sales_invoices/find_by_invoice_id/'.$this->invoiceId;
    }

    public function createDtoFromResponse(Response $response): SalesInvoice
    {
        return SalesInvoice::createFromResponseData($response->json());
    }
}
