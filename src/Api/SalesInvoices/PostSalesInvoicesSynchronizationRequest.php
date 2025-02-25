<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Api\SalesInvoices;

use Saloon\Http\Response;
use Sandorian\Moneybird\Api\Support\BaseJsonPostRequest;

class PostSalesInvoicesSynchronizationRequest extends BaseJsonPostRequest
{
    /**
     * @param  array<string>  $ids
     */
    public function __construct(
        protected readonly array $ids,
    ) {
        //
    }

    public function resolveEndpoint(): string
    {
        return 'sales_invoices/synchronization';
    }

    protected function defaultBody(): array
    {
        return [
            'ids' => $this->ids,
        ];
    }

    /**
     * @return array<SalesInvoice>
     */
    public function createDtoFromResponse(Response $response): array
    {
        $data = $response->json();

        return array_map(
            fn (array $item) => SalesInvoice::createFromResponseData($item),
            $data
        );
    }
}
