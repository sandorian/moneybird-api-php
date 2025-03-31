<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Api\SalesInvoices;

use Saloon\Http\Response;
use Sandorian\Moneybird\Api\Support\BaseJsonPostRequest;
use Sandorian\Moneybird\Api\Support\EncapsulatesData;

class CreateSalesInvoiceRequest extends BaseJsonPostRequest
{
    use EncapsulatesData;

    /**
     * @param  array<string, mixed>  $salesInvoiceData
     */
    public function __construct(
        protected readonly array $salesInvoiceData = [],
    ) {
        //
    }

    public function resolveEndpoint(): string
    {
        return 'sales_invoices';
    }

    public function createDtoFromResponse(Response $response): SalesInvoice
    {
        return SalesInvoice::createFromResponseData($response->json());
    }

    /**
     * Get the default body for the request
     *
     * @return array<string, mixed>
     */
    protected function defaultBody(): array
    {
        return $this->encapsulateData($this->salesInvoiceData);
    }

    /**
     * Get the resource key for encapsulation
     *
     * The Moneybird API requires data to be encapsulated within a 'sales_invoice' key
     */
    protected function getResourceKey(): string
    {
        return 'sales_invoice';
    }
}
