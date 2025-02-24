<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Api\SalesInvoices;

use Saloon\Enums\Method;
use Saloon\Http\Response;
use Sandorian\Moneybird\Api\Support\BaseJsonGetRequest;

class GetSalesInvoiceRequest extends BaseJsonGetRequest
{
    public function __construct(
        protected readonly string $id,
    ) {
        //
    }

    public function resolveEndpoint(): string
    {
        return 'sales_invoices/'.$this->id;
    }

    protected function defaultMethod(): Method
    {
        return Method::GET;
    }

    public function createDtoFromResponse(Response $response): SalesInvoice
    {
        return SalesInvoice::createFromResponseData($response->json());
    }
}
