<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Api\Documents\Receipts;

use Saloon\Http\Response;
use Sandorian\Moneybird\Api\Support\BaseJsonPostRequest;

class CreateReceiptRequest extends BaseJsonPostRequest
{
    /**
     * @param  array<string, mixed>  $receiptData
     */
    public function __construct(
        protected readonly array $receiptData,
    ) {
        //
    }

    public function resolveEndpoint(): string
    {
        return 'documents/receipts';
    }

    public function createDtoFromResponse(Response $response): Receipt
    {
        return Receipt::createFromResponseData($response->json());
    }

    protected function defaultBody(): array
    {
        return [
            'receipt' => $this->receiptData,
        ];
    }
}
