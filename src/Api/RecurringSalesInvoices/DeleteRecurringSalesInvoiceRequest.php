<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Api\RecurringSalesInvoices;

use Saloon\Http\Response;
use Sandorian\Moneybird\Api\Support\BaseJsonDeleteRequest;

class DeleteRecurringSalesInvoiceRequest extends BaseJsonDeleteRequest
{
    public function __construct(
        protected readonly string $recurringSalesInvoiceId,
    ) {
        //
    }

    public function resolveEndpoint(): string
    {
        return 'recurring_sales_invoices/'.$this->recurringSalesInvoiceId;
    }

    public function createDtoFromResponse(Response $response): bool
    {
        return $response->status() === 204;
    }
}
