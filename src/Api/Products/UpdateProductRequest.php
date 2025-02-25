<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Api\Products;

use Saloon\Http\Response;
use Sandorian\Moneybird\Api\Support\BaseJsonPatchRequest;

class UpdateProductRequest extends BaseJsonPatchRequest
{
    /**
     * @param  array<string, mixed>  $data
     */
    public function __construct(
        protected readonly string $productId,
        protected readonly array $data,
    ) {
        //
    }

    public function resolveEndpoint(): string
    {
        return 'products/'.$this->productId;
    }

    protected function defaultBody(): array
    {
        return [
            'product' => $this->data,
        ];
    }

    public function createDtoFromResponse(Response $response): Product
    {
        return Product::createFromResponseData($response->json());
    }
}
