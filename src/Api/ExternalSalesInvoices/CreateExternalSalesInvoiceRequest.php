<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Api\ExternalSalesInvoices;

use Saloon\Http\Response;
use Sandorian\Moneybird\Api\Support\BaseJsonPostRequest;

class CreateExternalSalesInvoiceRequest extends BaseJsonPostRequest
{
    public function resolveEndpoint(): string
    {
        return 'external_sales_invoices';
    }

    public function createDtoFromResponse(Response $response): ExternalSalesInvoice
    {
        return ExternalSalesInvoice::createFromResponseData($response->json());
    }
}
