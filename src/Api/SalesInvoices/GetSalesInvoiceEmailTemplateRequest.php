<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Api\SalesInvoices;

use Saloon\Http\Response;
use Sandorian\Moneybird\Api\Support\BaseJsonGetRequest;

class GetSalesInvoiceEmailTemplateRequest extends BaseJsonGetRequest
{
    public function __construct(
        protected readonly string $salesInvoiceId,
    ) {
        //
    }

    public function resolveEndpoint(): string
    {
        return "sales_invoices/{$this->salesInvoiceId}/send_email_template";
    }

    public function createDtoFromResponse(Response $response): array
    {
        return $response->json();
    }
}
