<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Tests\Api\PurchaseTransactions;

use Saloon\Http\Faking\MockResponse;
use Sandorian\Moneybird\Api\MoneybirdApiClient;
use Sandorian\Moneybird\Api\PurchaseTransactions\CreatePurchaseTransactionRequest;
use Sandorian\Moneybird\Api\PurchaseTransactions\DeletePurchaseTransactionRequest;
use Sandorian\Moneybird\Api\PurchaseTransactions\GetPurchaseTransactionRequest;
use Sandorian\Moneybird\Api\PurchaseTransactions\GetPurchaseTransactionsRequest;
use Sandorian\Moneybird\Api\PurchaseTransactions\PurchaseTransaction;
use Sandorian\Moneybird\Api\PurchaseTransactions\UpdatePurchaseTransactionRequest;
use Sandorian\Moneybird\Tests\Api\BaseTestCase;

class PurchaseTransactionsEndpointTest extends BaseTestCase
{
    private MoneybirdApiClient $client;

    protected function setUp(): void
    {
        parent::setUp();

        $this->client = $this->getMoneybirdClientWithMocks([
            GetPurchaseTransactionsRequest::class => MockResponse::make(PurchaseTransactionsResponseStub::getAll(), 200),
            GetPurchaseTransactionRequest::class => MockResponse::make(PurchaseTransactionsResponseStub::get(), 200),
            CreatePurchaseTransactionRequest::class => MockResponse::make(PurchaseTransactionsResponseStub::get(), 200),
            UpdatePurchaseTransactionRequest::class => MockResponse::make(PurchaseTransactionsResponseStub::get(), 200),
            DeletePurchaseTransactionRequest::class => MockResponse::make('', 204),
        ]);
    }

    public function test_it_can_get_all_purchase_transactions(): void
    {
        $purchaseTransactions = $this->client->purchaseTransactions()->all();

        $this->assertCount(1, $purchaseTransactions);
        $this->assertContainsOnlyInstancesOf(PurchaseTransaction::class, $purchaseTransactions);
        $this->assertSame('123456789012345678', $purchaseTransactions[0]->id);
        $this->assertSame('INV-001', $purchaseTransactions[0]->reference);
    }

    public function test_it_can_get_a_purchase_transaction(): void
    {
        $purchaseTransaction = $this->client->purchaseTransactions()->get('123456789012345678');

        $this->assertInstanceOf(PurchaseTransaction::class, $purchaseTransaction);
        $this->assertSame('123456789012345678', $purchaseTransaction->id);
        $this->assertSame('INV-001', $purchaseTransaction->reference);
    }

    public function test_it_can_create_a_purchase_transaction(): void
    {
        $purchaseTransaction = $this->client->purchaseTransactions()->create([
            'contact_id' => '123456789012345678',
            'reference' => 'INV-001',
            'date' => '2023-01-01',
            'due_date' => '2023-01-31',
            'currency' => 'EUR',
            'prices_are_incl_tax' => true,
            'details' => [
                [
                    'description' => 'Test Product',
                    'price' => '100.00',
                    'amount' => '1',
                    'tax_rate_id' => '123456789012345678',
                    'ledger_account_id' => '123456789012345678',
                ],
            ],
        ]);

        $this->assertInstanceOf(PurchaseTransaction::class, $purchaseTransaction);
        $this->assertSame('123456789012345678', $purchaseTransaction->id);
        $this->assertSame('INV-001', $purchaseTransaction->reference);
    }

    public function test_it_can_update_a_purchase_transaction(): void
    {
        $purchaseTransaction = $this->client->purchaseTransactions()->update('123456789012345678', [
            'reference' => 'INV-002',
        ]);

        $this->assertInstanceOf(PurchaseTransaction::class, $purchaseTransaction);
        $this->assertSame('123456789012345678', $purchaseTransaction->id);
        $this->assertSame('INV-001', $purchaseTransaction->reference);
    }

    public function test_it_can_delete_a_purchase_transaction(): void
    {
        $result = $this->client->purchaseTransactions()->delete('123456789012345678');

        $this->assertTrue($result);
    }
}
