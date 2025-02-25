<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Api\ExternalSalesInvoices;

use Sandorian\Moneybird\Api\Support\BaseJsonDeleteRequest;

class DeleteExternalSalesInvoiceRequest extends BaseJsonDeleteRequest
{
    public function __construct(
        protected readonly string $id
    ) {}

    public function resolveEndpoint(): string
    {
        return 'external_sales_invoices/' . $this->id;
    }
}
