<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Api\SalesInvoices;

use Saloon\Http\Response;
use Sandorian\Moneybird\Api\Support\BaseJsonGetRequest;

class FindSalesInvoiceByReferenceRequest extends BaseJsonGetRequest
{
    public function __construct(
        protected readonly string $reference,
    ) {
        //
    }

    public function resolveEndpoint(): string
    {
        return 'sales_invoices/find_by_reference/'.$this->reference;
    }

    public function createDtoFromResponse(Response $response): SalesInvoice
    {
        return SalesInvoice::createFromResponseData($response->json());
    }
}
