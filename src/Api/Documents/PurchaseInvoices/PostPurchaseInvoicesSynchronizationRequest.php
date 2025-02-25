<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Api\Documents\PurchaseInvoices;

use Saloon\Http\Response;
use Sandorian\Moneybird\Api\Support\BaseJsonPostRequest;

class PostPurchaseInvoicesSynchronizationRequest extends BaseJsonPostRequest
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
        return 'documents/purchase_invoices/synchronization';
    }

    /**
     * @return array<PurchaseInvoice>
     */
    public function createDtoFromResponse(Response $response): array
    {
        return array_map(
            fn (array $data) => PurchaseInvoice::createFromResponseData($data),
            $response->json()
        );
    }

    protected function defaultBody(): array
    {
        return [
            'ids' => $this->ids,
        ];
    }
}
