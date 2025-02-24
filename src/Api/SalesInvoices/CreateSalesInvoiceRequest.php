<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Api\SalesInvoices;

use Saloon\Http\Response;
use Sandorian\Moneybird\Api\Support\BaseJsonPostRequest;

class CreateSalesInvoiceRequest extends BaseJsonPostRequest
{
    public function resolveEndpoint(): string
    {
        return 'sales_invoices';
    }

    public function createDtoFromResponse(Response $response): SalesInvoice
    {
        return SalesInvoice::createFromResponseData($response->json());
    }
}
