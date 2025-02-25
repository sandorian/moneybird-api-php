<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Api\ExternalSalesInvoices\Payments;

use Sandorian\Moneybird\Api\Support\BaseJsonDeleteRequest;

class DeletePaymentForExternalSalesInvoiceRequest extends BaseJsonDeleteRequest
{
    public function __construct(
        protected readonly string $externalSalesInvoiceId,
        protected readonly string $paymentId
    ) {}

    public function resolveEndpoint(): string
    {
        return 'external_sales_invoices/' . $this->externalSalesInvoiceId . '/payments/' . $this->paymentId;
    }
}
