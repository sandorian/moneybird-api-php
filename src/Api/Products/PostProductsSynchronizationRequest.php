<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Api\Products;

use Saloon\Http\Response;
use Sandorian\Moneybird\Api\Support\BaseJsonPostRequest;

class PostProductsSynchronizationRequest extends BaseJsonPostRequest
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
        return 'products/synchronization';
    }

    protected function defaultBody(): array
    {
        return [
            'ids' => $this->ids,
        ];
    }

    /**
     * @return array<Product>
     */
    public function createDtoFromResponse(Response $response): array
    {
        $data = $response->json();

        return array_map(
            fn (array $item) => Product::createFromResponseData($item),
            $data
        );
    }
}
