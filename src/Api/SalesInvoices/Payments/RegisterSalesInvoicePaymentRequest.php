<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Api\SalesInvoices\Payments;

use Saloon\Http\Response;
use Sandorian\Moneybird\Api\SalesInvoices\SalesInvoice;
use Sandorian\Moneybird\Api\Support\BaseJsonPostRequest;
use Sandorian\Moneybird\Api\Support\EncapsulatesData;

class RegisterSalesInvoicePaymentRequest extends BaseJsonPostRequest
{
    use EncapsulatesData;

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
        return $this->encapsulateData($this->data);
    }

    /**
     * Get the resource key for encapsulation
     *
     * The Moneybird API requires data to be encapsulated within a 'payment' key
     */
    protected function getResourceKey(): string
    {
        return 'payment';
    }

    public function createDtoFromResponse(Response $response): SalesInvoice
    {
        return SalesInvoice::createFromResponseData($response->json());
    }
}
