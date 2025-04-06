<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Api\Products;

use Saloon\PaginationPlugin\Paginator;
use Sandorian\Moneybird\Api\Support\BaseEndpoint;
use Sandorian\Moneybird\Api\Support\IdVersion;
use Sandorian\Moneybird\Api\Support\MoneybirdPaginator;

class ProductsEndpoint extends BaseEndpoint
{
    /**
     * @return Paginator<Product>
     */
    public function paginate(): Paginator
    {
        $request = new GetProductsRequest;

        return new MoneybirdPaginator($this->client, $request);
    }

    /**
     * @return array<Product>
     */
    public function all(): array
    {
        $request = new GetProductsRequest;

        return $this->client->send($request)->dtoOrFail();
    }

    /**
     * @return array<IdVersion>
     */
    public function synchronization(): array
    {
        $request = new GetProductsSynchronizationRequest;

        return $this->client->send($request)->dtoOrFail();
    }

    /**
     * @param  array<string>  $ids
     * @return array<Product>
     */
    public function synchronize(array $ids): array
    {
        $request = new PostProductsSynchronizationRequest($ids);

        return $this->client->send($request)->dtoOrFail();
    }

    public function get(string $productId): Product
    {
        $request = new GetProductRequest($productId);

        return $this->client->send($request)->dtoOrFail();
    }

    /**
     * @param  array<string, mixed>  $data
     */
    public function create(array $data): Product
    {
        $request = new CreateProductRequest($data);
        if (method_exists($request, 'setEncapsulatedData')) {
            $request->setEncapsulatedData($data);
        }

        return $this->client->send($request)->dtoOrFail();
    }

    /**
     * @param  array<string, mixed>  $data
     */
    public function update(string $productId, array $data): Product
    {
        $request = new UpdateProductRequest($productId, $data);
        if (method_exists($request, 'setEncapsulatedData')) {
            $request->setEncapsulatedData($data);
        }

        return $this->client->send($request)->dtoOrFail();
    }

    public function delete(string $productId): bool
    {
        $request = new DeleteProductRequest($productId);

        return $this->client->send($request)->dtoOrFail();
    }
}
