<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Api\SalesInvoices;

use Saloon\Http\Response;
use Sandorian\Moneybird\Api\Support\BaseJsonPatchRequest;

class SendSalesInvoiceEmailRequest extends BaseJsonPatchRequest
{
    /**
     * @param  array<string, mixed>  $sendingData
     */
    public function __construct(
        protected readonly string $salesInvoiceId,
        protected readonly array $sendingData = [],
    ) {
        //
    }

    public function resolveEndpoint(): string
    {
        return "sales_invoices/{$this->salesInvoiceId}/send_invoice";
    }

    public function createDtoFromResponse(Response $response): SalesInvoice
    {
        return SalesInvoice::createFromResponseData($response->json());
    }

    protected function defaultBody(): array
    {
        if (empty($this->sendingData)) {
            return [];
        }

        return [
            'sales_invoice_sending' => $this->sendingData,
        ];
    }
}
