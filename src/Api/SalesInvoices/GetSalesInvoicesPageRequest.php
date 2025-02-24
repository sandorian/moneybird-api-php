<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Api\SalesInvoices;

use Saloon\Http\Response;
use Saloon\PaginationPlugin\Contracts\Paginatable;
use Sandorian\Moneybird\Api\Support\BaseJsonGetRequest;

class GetSalesInvoicesPageRequest extends BaseJsonGetRequest implements Paginatable
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
