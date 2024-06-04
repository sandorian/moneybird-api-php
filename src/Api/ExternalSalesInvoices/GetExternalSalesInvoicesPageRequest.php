<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Api\ExternalSalesInvoices;

use Sandorian\Moneybird\Api\Support\BaseJsonGetRequest;

class GetExternalSalesInvoicesPageRequest extends BaseJsonGetRequest
{
    public function resolveEndpoint(): string
    {
        return 'external_sales_invoices';
    }
}
