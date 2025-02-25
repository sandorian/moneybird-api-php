<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Api\ExternalSalesInvoices;

use Saloon\Http\Response;
use Sandorian\Moneybird\Api\Support\BaseJsonPatchRequest;

class UpdateExternalSalesInvoiceRequest extends BaseJsonPatchRequest
{
    public function __construct(
        protected readonly string $id
    ) {}

    public function resolveEndpoint(): string
    {
        return 'external_sales_invoices/'.$this->id;
    }

    public function createDtoFromResponse(Response $response): ExternalSalesInvoice
    {
        return ExternalSalesInvoice::createFromResponseData($response->json());
    }
}
