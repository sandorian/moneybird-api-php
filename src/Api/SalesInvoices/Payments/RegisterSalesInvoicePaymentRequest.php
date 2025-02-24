<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Api\SalesInvoices\Payments;

use Saloon\Contracts\Body\HasBody;
use Saloon\Traits\Body\HasJsonBody;
use Sandorian\Moneybird\Api\Support\BaseJsonPostRequest;

class RegisterSalesInvoicePaymentRequest extends BaseJsonPostRequest implements HasBody
{
    use HasJsonBody;

    public function __construct(
        protected readonly string $salesInvoiceId,
        protected readonly array $data,
    ) {
        //
    }

    public function resolveEndpoint(): string
    {
        return 'sales_invoices/'.$this->salesInvoiceId.'/payments';
    }

    public function defaultBody(): array
    {
        return ['payment' => $this->data];
    }
}
