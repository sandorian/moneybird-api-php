<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Api\Products;

use Saloon\Http\Response;
use Sandorian\Moneybird\Api\Support\BaseJsonDeleteRequest;

class DeleteProductRequest extends BaseJsonDeleteRequest
{
    public function __construct(
        protected readonly string $productId,
    ) {
        //
    }

    public function resolveEndpoint(): string
    {
        return 'products/'.$this->productId;
    }

    public function createDtoFromResponse(Response $response): bool
    {
        return $response->status() === 204;
    }
}
