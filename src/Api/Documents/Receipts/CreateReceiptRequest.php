<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Api\Documents\Receipts;

use Saloon\Http\Response;
use Sandorian\Moneybird\Api\Support\BaseJsonPostRequest;
use Sandorian\Moneybird\Api\Support\EncapsulatesData;

class CreateReceiptRequest extends BaseJsonPostRequest
{
    use EncapsulatesData;

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

    /**
     * Get the resource key for encapsulation
     *
     * The Moneybird API requires data to be encapsulated within a 'receipt' key
     */
    protected function getResourceKey(): string
    {
        return 'receipt';
    }

    protected function defaultBody(): array
    {
        return $this->encapsulateData($this->receiptData);
    }
}
