<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Api\RecurringSalesInvoices;

use Saloon\Http\Response;
use Sandorian\Moneybird\Api\Support\BaseJsonPostRequest;

class CreateRecurringSalesInvoiceRequest extends BaseJsonPostRequest
{
    /**
     * @param  array<string, mixed>  $data
     */
    public function __construct(
        protected readonly array $data,
    ) {
        //
    }

    public function resolveEndpoint(): string
    {
        return 'recurring_sales_invoices';
    }

    protected function defaultBody(): array
    {
        return [
            'recurring_sales_invoice' => $this->data,
        ];
    }

    public function createDtoFromResponse(Response $response): RecurringSalesInvoice
    {
        return RecurringSalesInvoice::createFromResponseData($response->json());
    }
}
