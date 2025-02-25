<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Api\Documents\Receipts;

use Saloon\Http\Response;
use Sandorian\Moneybird\Api\Support\BaseJsonDeleteRequest;

class DeleteReceiptRequest extends BaseJsonDeleteRequest
{
    public function __construct(
        protected readonly string $receiptId,
    ) {
        //
    }

    public function resolveEndpoint(): string
    {
        return 'documents/receipts/'.$this->receiptId;
    }

    public function createDtoFromResponse(Response $response): bool
    {
        return $response->status() === 204;
    }
}
