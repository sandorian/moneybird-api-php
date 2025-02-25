<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Api\Documents\Receipts;

use Saloon\Http\Response;
use Sandorian\Moneybird\Api\Support\BaseJsonPostRequest;

class PostReceiptsSynchronizationRequest extends BaseJsonPostRequest
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
        return 'documents/receipts/synchronization';
    }

    /**
     * @return array<Receipt>
     */
    public function createDtoFromResponse(Response $response): array
    {
        return array_map(
            fn (array $data) => Receipt::createFromResponseData($data),
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
