<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Api\Documents\Receipts;

use Saloon\Http\Response;
use Sandorian\Moneybird\Api\Support\BaseJsonGetRequest;

class GetReceiptsRequest extends BaseJsonGetRequest
{
    public function resolveEndpoint(): string
    {
        return 'documents/receipts';
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
}
