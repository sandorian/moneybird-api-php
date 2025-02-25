<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Tests\Api\Products;

use Saloon\Http\Faking\MockResponse;
use Sandorian\Moneybird\Api\MoneybirdApiClient;
use Sandorian\Moneybird\Api\Products\CreateProductRequest;
use Sandorian\Moneybird\Api\Products\DeleteProductRequest;
use Sandorian\Moneybird\Api\Products\GetProductRequest;
use Sandorian\Moneybird\Api\Products\GetProductsRequest;
use Sandorian\Moneybird\Api\Products\GetProductsSynchronizationRequest;
use Sandorian\Moneybird\Api\Products\PostProductsSynchronizationRequest;
use Sandorian\Moneybird\Api\Products\Product;
use Sandorian\Moneybird\Api\Products\UpdateProductRequest;
use Sandorian\Moneybird\Api\Support\IdVersion;
use Sandorian\Moneybird\Tests\Api\BaseTestCase;

class ProductsEndpointTest extends BaseTestCase
{
    private MoneybirdApiClient $client;

    protected function setUp(): void
    {
        parent::setUp();

        $this->client = $this->getMoneybirdClientWithMocks([
            GetProductsRequest::class => MockResponse::make(ProductsResponseStub::getProducts(), 200),
            GetProductRequest::class => MockResponse::make(ProductsResponseStub::getProduct(), 200),
            GetProductsSynchronizationRequest::class => MockResponse::make(ProductsResponseStub::getProductsSynchronization(), 200),
            PostProductsSynchronizationRequest::class => MockResponse::make(ProductsResponseStub::getProducts(), 200),
            CreateProductRequest::class => MockResponse::make(ProductsResponseStub::getProduct(), 200),
            UpdateProductRequest::class => MockResponse::make(ProductsResponseStub::getProduct(), 200),
            DeleteProductRequest::class => MockResponse::make('', 204),
        ]);
    }

    public function test_it_can_get_all_products(): void
    {
        $products = $this->client->products()->all();

        $this->assertCount(1, $products);
        $this->assertContainsOnlyInstancesOf(Product::class, $products);
        $this->assertSame('123456789012345678', $products[0]->id);
        $this->assertSame('Test Product', $products[0]->title);
    }

    public function test_it_can_get_a_product(): void
    {
        $product = $this->client->products()->get('123456789012345678');

        $this->assertInstanceOf(Product::class, $product);
        $this->assertSame('123456789012345678', $product->id);
        $this->assertSame('Test Product', $product->title);
    }

    public function test_it_can_create_a_product(): void
    {
        $product = $this->client->products()->create([
            'title' => 'Test Product',
            'description' => 'Test Description',
            'price' => '10.00',
        ]);

        $this->assertInstanceOf(Product::class, $product);
        $this->assertSame('123456789012345678', $product->id);
        $this->assertSame('Test Product', $product->title);
    }

    public function test_it_can_update_a_product(): void
    {
        $product = $this->client->products()->update('123456789012345678', [
            'title' => 'Updated Product',
        ]);

        $this->assertInstanceOf(Product::class, $product);
        $this->assertSame('123456789012345678', $product->id);
        $this->assertSame('Test Product', $product->title);
    }

    public function test_it_can_delete_a_product(): void
    {
        $result = $this->client->products()->delete('123456789012345678');

        $this->assertTrue($result);
    }

    public function test_it_can_get_products_synchronization(): void
    {
        $synchronization = $this->client->products()->synchronization();

        $this->assertCount(1, $synchronization);
        $this->assertContainsOnlyInstancesOf(IdVersion::class, $synchronization);
        $this->assertSame('123456789012345678', $synchronization[0]->id);
        $this->assertSame(1, $synchronization[0]->version);
    }

    public function test_it_can_synchronize_products(): void
    {
        $products = $this->client->products()->synchronize(['123456789012345678']);

        $this->assertCount(1, $products);
        $this->assertContainsOnlyInstancesOf(Product::class, $products);
        $this->assertSame('123456789012345678', $products[0]->id);
        $this->assertSame('Test Product', $products[0]->title);
    }
}
