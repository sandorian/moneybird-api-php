<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Api\ExternalSalesInvoices;

use Saloon\Http\Response;
use Sandorian\Moneybird\Api\Support\BaseJsonPatchRequest;
use Sandorian\Moneybird\Api\Support\EncapsulatesData;

class UpdateExternalSalesInvoiceRequest extends BaseJsonPatchRequest
{
    use EncapsulatesData;

    /**
     * @param  string  $id  The ID of the external sales invoice to update
     * @param  array<string, mixed>  $externalSalesInvoiceData  The data to update the external sales invoice with
     */
    public function __construct(
        protected readonly string $id,
        protected readonly array $externalSalesInvoiceData = []
    ) {}

    public function resolveEndpoint(): string
    {
        return 'external_sales_invoices/'.$this->id;
    }

    public function createDtoFromResponse(Response $response): ExternalSalesInvoice
    {
        return ExternalSalesInvoice::createFromResponseData($response->json());
    }

    /**
     * Get the default body for the request
     *
     * @return array<string, mixed>
     */
    protected function defaultBody(): array
    {
        return $this->encapsulateData($this->externalSalesInvoiceData);
    }

    /**
     * Get the resource key for encapsulation
     *
     * The Moneybird API requires data to be encapsulated within an 'external_sales_invoice' key
     */
    protected function getResourceKey(): string
    {
        return 'external_sales_invoice';
    }
}
