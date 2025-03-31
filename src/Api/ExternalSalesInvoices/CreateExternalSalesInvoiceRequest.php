<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Api\ExternalSalesInvoices;

use Saloon\Http\Response;
use Sandorian\Moneybird\Api\Support\BaseJsonPostRequest;
use Sandorian\Moneybird\Api\Support\EncapsulatesData;

class CreateExternalSalesInvoiceRequest extends BaseJsonPostRequest
{
    use EncapsulatesData;

    /**
     * @param  array<string, mixed>  $externalSalesInvoiceData
     */
    public function __construct(
        protected readonly array $externalSalesInvoiceData = [],
    ) {
        //
    }

    public function resolveEndpoint(): string
    {
        return 'external_sales_invoices';
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
