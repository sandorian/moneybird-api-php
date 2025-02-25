<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Api\Products;

use Saloon\Http\Response;
use Sandorian\Moneybird\Api\Support\BaseJsonGetRequest;

class GetProductsRequest extends BaseJsonGetRequest
{
    public function resolveEndpoint(): string
    {
        return 'products';
    }

    /**
     * @return array<Product>
     */
    public function createDtoFromResponse(Response $response): array
    {
        return array_map(
            fn (array $data) => Product::createFromResponseData($data),
            $response->json()
        );
    }
}
