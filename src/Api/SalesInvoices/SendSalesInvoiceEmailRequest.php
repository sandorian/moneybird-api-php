<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Api\SalesInvoices;

use Saloon\Http\Response;
use Sandorian\Moneybird\Api\Support\BaseJsonPostRequest;

class SendSalesInvoiceEmailRequest extends BaseJsonPostRequest
{
    public function __construct(
        protected readonly string $salesInvoiceId,
    ) {
        //
    }

    public function resolveEndpoint(): string
    {
        return "sales_invoices/{$this->salesInvoiceId}/send_email";
    }

    public function createDtoFromResponse(Response $response): SalesInvoice
    {
        return SalesInvoice::createFromResponseData($response->json());
    }
}
