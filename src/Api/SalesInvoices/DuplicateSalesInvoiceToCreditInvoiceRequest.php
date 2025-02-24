<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Api\SalesInvoices;

use Sandorian\Moneybird\Api\Support\BaseJsonPostRequest;

class DuplicateSalesInvoiceToCreditInvoiceRequest extends BaseJsonPostRequest
{
    public function __construct(
        protected readonly string $salesInvoiceId,
    ) {
        //
    }

    public function resolveEndpoint(): string
    {
        return 'sales_invoices/'.$this->salesInvoiceId.'/duplicate_creditinvoice';
    }
}
