<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Tests\Api\RecurringSalesInvoices;

use Saloon\Http\Faking\MockResponse;
use Sandorian\Moneybird\Api\MoneybirdApiClient;
use Sandorian\Moneybird\Api\RecurringSalesInvoices\CreateRecurringSalesInvoiceRequest;
use Sandorian\Moneybird\Api\RecurringSalesInvoices\DeleteRecurringSalesInvoiceRequest;
use Sandorian\Moneybird\Api\RecurringSalesInvoices\GetRecurringSalesInvoiceRequest;
use Sandorian\Moneybird\Api\RecurringSalesInvoices\GetRecurringSalesInvoicesRequest;
use Sandorian\Moneybird\Api\RecurringSalesInvoices\GetRecurringSalesInvoicesSynchronizationRequest;
use Sandorian\Moneybird\Api\RecurringSalesInvoices\PostRecurringSalesInvoicesSynchronizationRequest;
use Sandorian\Moneybird\Api\RecurringSalesInvoices\RecurringSalesInvoice;
use Sandorian\Moneybird\Api\RecurringSalesInvoices\UpdateRecurringSalesInvoiceRequest;
use Sandorian\Moneybird\Api\Support\IdVersion;
use Sandorian\Moneybird\Tests\Api\BaseTestCase;

class RecurringSalesInvoicesEndpointTest extends BaseTestCase
{
    private MoneybirdApiClient $client;

    protected function setUp(): void
    {
        parent::setUp();

        $this->client = $this->getMoneybirdClientWithMocks([
            GetRecurringSalesInvoicesRequest::class => MockResponse::make(RecurringSalesInvoicesResponseStub::getAll(), 200),
            GetRecurringSalesInvoiceRequest::class => MockResponse::make(RecurringSalesInvoicesResponseStub::get(), 200),
            GetRecurringSalesInvoicesSynchronizationRequest::class => MockResponse::make(RecurringSalesInvoicesResponseStub::getSynchronization(), 200),
            PostRecurringSalesInvoicesSynchronizationRequest::class => MockResponse::make(RecurringSalesInvoicesResponseStub::getAll(), 200),
            CreateRecurringSalesInvoiceRequest::class => MockResponse::make(RecurringSalesInvoicesResponseStub::get(), 200),
            UpdateRecurringSalesInvoiceRequest::class => MockResponse::make(RecurringSalesInvoicesResponseStub::get(), 200),
            DeleteRecurringSalesInvoiceRequest::class => MockResponse::make('', 204),
        ]);
    }

    public function test_it_can_get_all_recurring_sales_invoices(): void
    {
        $recurringSalesInvoices = $this->client->recurringSalesInvoices()->all();

        $this->assertCount(1, $recurringSalesInvoices);
        $this->assertContainsOnlyInstancesOf(RecurringSalesInvoice::class, $recurringSalesInvoices);
        $this->assertSame('123456789012345678', $recurringSalesInvoices[0]->id);
        $this->assertSame('REF-001', $recurringSalesInvoices[0]->reference);
    }

    public function test_it_can_get_all_recurring_sales_invoices_paginated(): void
    {
        $recurringSalesInvoices = iterator_to_array($this->client->recurringSalesInvoices()->paginate()->items());

        $this->assertCount(1, $recurringSalesInvoices);
        $this->assertContainsOnlyInstancesOf(RecurringSalesInvoice::class, $recurringSalesInvoices);
        $this->assertSame('123456789012345678', $recurringSalesInvoices[0]->id);
        $this->assertSame('REF-001', $recurringSalesInvoices[0]->reference);
    }

    public function test_it_can_get_a_recurring_sales_invoice(): void
    {
        $recurringSalesInvoice = $this->client->recurringSalesInvoices()->get('123456789012345678');

        $this->assertInstanceOf(RecurringSalesInvoice::class, $recurringSalesInvoice);
        $this->assertSame('123456789012345678', $recurringSalesInvoice->id);
        $this->assertSame('REF-001', $recurringSalesInvoice->reference);
    }

    public function test_it_can_create_a_recurring_sales_invoice(): void
    {
        $recurringSalesInvoice = $this->client->recurringSalesInvoices()->create([
            'contact_id' => '123456789012345678',
            'workflow_id' => '123456789012345678',
            'reference' => 'REF-001',
            'start_date' => '2023-01-01',
            'invoice_period' => 'month',
            'invoice_interval' => '1',
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

        $this->assertInstanceOf(RecurringSalesInvoice::class, $recurringSalesInvoice);
        $this->assertSame('123456789012345678', $recurringSalesInvoice->id);
        $this->assertSame('REF-001', $recurringSalesInvoice->reference);
    }

    public function test_it_can_update_a_recurring_sales_invoice(): void
    {
        $recurringSalesInvoice = $this->client->recurringSalesInvoices()->update('123456789012345678', [
            'reference' => 'REF-002',
        ]);

        $this->assertInstanceOf(RecurringSalesInvoice::class, $recurringSalesInvoice);
        $this->assertSame('123456789012345678', $recurringSalesInvoice->id);
        $this->assertSame('REF-001', $recurringSalesInvoice->reference);
    }

    public function test_it_can_delete_a_recurring_sales_invoice(): void
    {
        $result = $this->client->recurringSalesInvoices()->delete('123456789012345678');

        $this->assertTrue($result);
    }

    public function test_it_can_get_recurring_sales_invoices_synchronization(): void
    {
        $synchronization = $this->client->recurringSalesInvoices()->synchronization();

        $this->assertCount(1, $synchronization);
        $this->assertContainsOnlyInstancesOf(IdVersion::class, $synchronization);
        $this->assertSame('123456789012345678', $synchronization[0]->id);
        $this->assertSame(1, $synchronization[0]->version);
    }

    public function test_it_can_synchronize_recurring_sales_invoices(): void
    {
        $recurringSalesInvoices = $this->client->recurringSalesInvoices()->synchronize(['123456789012345678']);

        $this->assertCount(1, $recurringSalesInvoices);
        $this->assertContainsOnlyInstancesOf(RecurringSalesInvoice::class, $recurringSalesInvoices);
        $this->assertSame('123456789012345678', $recurringSalesInvoices[0]->id);
        $this->assertSame('REF-001', $recurringSalesInvoices[0]->reference);
    }
}
