<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Api\SalesInvoices;

use Sandorian\Moneybird\Api\Support\BaseJsonDeleteRequest;

class DeleteSalesInvoiceRequest extends BaseJsonDeleteRequest
{
    public function __construct(
        protected readonly string $salesInvoiceId,
    ) {
        //
    }

    public function resolveEndpoint(): string
    {
        return "sales_invoices/{$this->salesInvoiceId}";
    }
}
