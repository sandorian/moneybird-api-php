<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Api\Products;

use Saloon\Http\Response;
use Sandorian\Moneybird\Api\Support\BaseJsonGetRequest;

class GetProductRequest extends BaseJsonGetRequest
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

    public function createDtoFromResponse(Response $response): Product
    {
        return Product::createFromResponseData($response->json());
    }
}
