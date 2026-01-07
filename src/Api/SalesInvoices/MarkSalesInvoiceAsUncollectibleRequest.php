<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Api\SalesInvoices;

use Saloon\Http\Response;
use Sandorian\Moneybird\Api\Support\BaseJsonPatchRequest;

class MarkSalesInvoiceAsUncollectibleRequest extends BaseJsonPatchRequest
{
    /**
     * @param  array<string, mixed>  $data  Optional: uncollectible_date, book_method
     */
    public function __construct(
        protected readonly string $salesInvoiceId,
        protected readonly array $data = [],
    ) {
        //
    }

    public function resolveEndpoint(): string
    {
        return "sales_invoices/{$this->salesInvoiceId}/mark_as_uncollectible";
    }

    public function createDtoFromResponse(Response $response): SalesInvoice
    {
        return SalesInvoice::createFromResponseData($response->json());
    }

    protected function defaultBody(): array
    {
        return $this->data;
    }
}
