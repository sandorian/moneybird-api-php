<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Api\ExternalSalesInvoices;

use Sandorian\Moneybird\Api\Support\BaseJsonPostRequest;

class CreatePaymentForExternalSalesInvoiceRequest extends BaseJsonPostRequest
{
    public function __construct(
        protected readonly string $externalSalesInvoiceId,
    ) {
        //
    }

    public function resolveEndpoint(): string
    {
        return 'external_sales_invoices/'.$this->externalSalesInvoiceId.'/payments';
    }
}
