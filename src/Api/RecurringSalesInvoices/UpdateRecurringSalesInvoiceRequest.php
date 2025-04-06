<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Api\RecurringSalesInvoices;

use Saloon\Http\Response;
use Sandorian\Moneybird\Api\Support\BaseJsonPatchRequest;
use Sandorian\Moneybird\Api\Support\EncapsulatesData;

class UpdateRecurringSalesInvoiceRequest extends BaseJsonPatchRequest
{
    use EncapsulatesData;

    /**
     * @param  array<string, mixed>  $data
     */
    public function __construct(
        protected readonly string $recurringSalesInvoiceId,
        protected readonly array $data,
    ) {
        //
    }

    public function resolveEndpoint(): string
    {
        return 'recurring_sales_invoices/'.$this->recurringSalesInvoiceId;
    }

    protected function defaultBody(): array
    {
        return $this->encapsulateData($this->data);
    }

    /**
     * Get the resource key for encapsulation
     *
     * The Moneybird API requires data to be encapsulated within a 'recurring_sales_invoice' key
     */
    protected function getResourceKey(): string
    {
        return 'recurring_sales_invoice';
    }

    public function createDtoFromResponse(Response $response): RecurringSalesInvoice
    {
        return RecurringSalesInvoice::createFromResponseData($response->json());
    }
}
