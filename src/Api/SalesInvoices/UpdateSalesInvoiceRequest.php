<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Api\SalesInvoices;

use Saloon\Http\Response;
use Sandorian\Moneybird\Api\Support\BaseJsonPatchRequest;
use Sandorian\Moneybird\Api\Support\EncapsulatesData;

class UpdateSalesInvoiceRequest extends BaseJsonPatchRequest
{
    use EncapsulatesData;

    /**
     * @param  string  $salesInvoiceId  The ID of the sales invoice to update
     * @param  array<string, mixed>  $salesInvoiceData  The data to update the sales invoice with
     */
    public function __construct(
        protected readonly string $salesInvoiceId,
        protected readonly array $salesInvoiceData = [],
    ) {
        //
    }

    public function resolveEndpoint(): string
    {
        return "sales_invoices/{$this->salesInvoiceId}";
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
