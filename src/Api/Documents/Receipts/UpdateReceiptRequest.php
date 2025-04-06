<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Api\Documents\Receipts;

use Saloon\Http\Response;
use Sandorian\Moneybird\Api\Support\BaseJsonPatchRequest;
use Sandorian\Moneybird\Api\Support\EncapsulatesData;

class UpdateReceiptRequest extends BaseJsonPatchRequest
{
    use EncapsulatesData;

    /**
     * @param  array<string, mixed>  $receiptData
     */
    public function __construct(
        protected readonly string $receiptId,
        protected readonly array $receiptData,
    ) {
        //
    }

    public function resolveEndpoint(): string
    {
        return 'documents/receipts/'.$this->receiptId;
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
