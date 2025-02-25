<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Api\SalesInvoices\Payments;

use Sandorian\Moneybird\Api\Support\BaseJsonDeleteRequest;

class DeleteSalesInvoicePaymentRequest extends BaseJsonDeleteRequest
{
    public function __construct(
        protected readonly string $salesInvoiceId,
        protected readonly string $paymentId,
    ) {
        //
    }

    public function resolveEndpoint(): string
    {
        return "sales_invoices/{$this->salesInvoiceId}/payments/{$this->paymentId}";
    }
}
