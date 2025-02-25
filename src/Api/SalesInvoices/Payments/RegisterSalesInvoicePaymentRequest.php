<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Api\SalesInvoices\Payments;

use Saloon\Http\Response;
use Sandorian\Moneybird\Api\SalesInvoices\SalesInvoice;
use Sandorian\Moneybird\Api\Support\BaseJsonPostRequest;

class RegisterSalesInvoicePaymentRequest extends BaseJsonPostRequest
{
    /**
     * @param  array<string, mixed>  $data
     */
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

    protected function defaultBody(): array
    {
        return [
            'payment' => $this->data,
        ];
    }

    public function createDtoFromResponse(Response $response): SalesInvoice
    {
        return SalesInvoice::createFromResponseData($response->json());
    }
}
