<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Api\ExternalSalesInvoices;

use Saloon\Http\Response;
use Saloon\PaginationPlugin\Contracts\Paginatable;
use Sandorian\Moneybird\Api\ExternalSalesInvoices\Payments\ExternalSalesInvoicePayment;
use Sandorian\Moneybird\Api\Support\BaseJsonGetRequest;

class GetExternalSalesInvoicesPageRequest extends BaseJsonGetRequest implements Paginatable
{
    public function resolveEndpoint(): string
    {
        return 'external_sales_invoices';
    }

    public function createDtoFromResponse(Response $response): ExternalSalesInvoicePayment
    {
        return ExternalSalesInvoicePayment::createFromResponseData($response->json());
    }
}
