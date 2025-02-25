<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Tests\Api\Documents\PurchaseInvoices;

use Saloon\Http\Faking\MockResponse;
use Sandorian\Moneybird\Api\Documents\PurchaseInvoices\CreatePurchaseInvoiceAttachmentRequest;
use Sandorian\Moneybird\Api\Documents\PurchaseInvoices\CreatePurchaseInvoiceRequest;
use Sandorian\Moneybird\Api\Documents\PurchaseInvoices\DeletePurchaseInvoiceAttachmentRequest;
use Sandorian\Moneybird\Api\Documents\PurchaseInvoices\DeletePurchaseInvoiceRequest;
use Sandorian\Moneybird\Api\Documents\PurchaseInvoices\GetPurchaseInvoiceRequest;
use Sandorian\Moneybird\Api\Documents\PurchaseInvoices\GetPurchaseInvoicesRequest;
use Sandorian\Moneybird\Api\Documents\PurchaseInvoices\GetPurchaseInvoicesSynchronizationRequest;
use Sandorian\Moneybird\Api\Documents\PurchaseInvoices\PostPurchaseInvoicesSynchronizationRequest;
use Sandorian\Moneybird\Api\Documents\PurchaseInvoices\PurchaseInvoice;
use Sandorian\Moneybird\Api\Documents\PurchaseInvoices\UpdatePurchaseInvoiceRequest;
use Sandorian\Moneybird\Api\MoneybirdApiClient;
use Sandorian\Moneybird\Api\Support\IdVersion;
use Sandorian\Moneybird\Tests\Api\BaseTestCase;

class PurchaseInvoicesEndpointTest extends BaseTestCase
{
    private MoneybirdApiClient $client;

    protected function setUp(): void
    {
        parent::setUp();

        $this->client = $this->getMoneybirdClientWithMocks([
            GetPurchaseInvoicesRequest::class => MockResponse::make(PurchaseInvoicesResponseStub::getAll(), 200),
            GetPurchaseInvoicesSynchronizationRequest::class => MockResponse::make(PurchaseInvoicesResponseStub::synchronization(), 200),
            PostPurchaseInvoicesSynchronizationRequest::class => MockResponse::make(PurchaseInvoicesResponseStub::getAll(), 200),
            GetPurchaseInvoiceRequest::class => MockResponse::make(PurchaseInvoicesResponseStub::get(), 200),
            CreatePurchaseInvoiceRequest::class => MockResponse::make(PurchaseInvoicesResponseStub::create(), 201),
            UpdatePurchaseInvoiceRequest::class => MockResponse::make(PurchaseInvoicesResponseStub::update(), 200),
            DeletePurchaseInvoiceRequest::class => MockResponse::make('', 204),
            CreatePurchaseInvoiceAttachmentRequest::class => MockResponse::make(PurchaseInvoicesResponseStub::createAttachment(), 201),
            DeletePurchaseInvoiceAttachmentRequest::class => MockResponse::make('', 204),
        ]);
    }

    public function test_it_can_get_all_purchase_invoices(): void
    {
        $purchaseInvoices = $this->client->purchaseInvoices()->all();

        $this->assertCount(2, $purchaseInvoices);
        $this->assertContainsOnlyInstancesOf(PurchaseInvoice::class, $purchaseInvoices);
        $this->assertSame('123456789', $purchaseInvoices[0]->id);
        $this->assertSame('987654321', $purchaseInvoices[1]->id);
    }

    public function test_it_can_get_purchase_invoices_synchronization(): void
    {
        $synchronization = $this->client->purchaseInvoices()->synchronization();

        $this->assertCount(2, $synchronization);
        $this->assertContainsOnlyInstancesOf(IdVersion::class, $synchronization);
        $this->assertSame('123456789', $synchronization[0]->id);
        $this->assertSame('987654321', $synchronization[1]->id);
    }

    public function test_it_can_synchronize_purchase_invoices(): void
    {
        $purchaseInvoices = $this->client->purchaseInvoices()->synchronize(['123456789', '987654321']);

        $this->assertCount(2, $purchaseInvoices);
        $this->assertContainsOnlyInstancesOf(PurchaseInvoice::class, $purchaseInvoices);
        $this->assertSame('123456789', $purchaseInvoices[0]->id);
        $this->assertSame('987654321', $purchaseInvoices[1]->id);
    }

    public function test_it_can_get_a_purchase_invoice(): void
    {
        $purchaseInvoice = $this->client->purchaseInvoices()->get('123456789');

        $this->assertInstanceOf(PurchaseInvoice::class, $purchaseInvoice);
        $this->assertSame('123456789', $purchaseInvoice->id);
        $this->assertSame('Test Purchase Invoice', $purchaseInvoice->reference);
    }

    public function test_it_can_create_a_purchase_invoice(): void
    {
        $purchaseInvoice = $this->client->purchaseInvoices()->create([
            'reference' => 'New Purchase Invoice',
            'date' => '2023-03-01',
        ]);

        $this->assertInstanceOf(PurchaseInvoice::class, $purchaseInvoice);
        $this->assertSame('123456789', $purchaseInvoice->id);
        $this->assertSame('New Purchase Invoice', $purchaseInvoice->reference);
    }

    public function test_it_can_update_a_purchase_invoice(): void
    {
        $purchaseInvoice = $this->client->purchaseInvoices()->update('123456789', [
            'reference' => 'Updated Purchase Invoice',
        ]);

        $this->assertInstanceOf(PurchaseInvoice::class, $purchaseInvoice);
        $this->assertSame('123456789', $purchaseInvoice->id);
        $this->assertSame('Updated Purchase Invoice', $purchaseInvoice->reference);
    }

    public function test_it_can_delete_a_purchase_invoice(): void
    {
        $result = $this->client->purchaseInvoices()->delete('123456789');

        $this->assertTrue($result);
    }

    public function test_it_can_create_an_attachment(): void
    {
        $attachment = $this->client->purchaseInvoices()->createAttachment('123456789', [
            'filename' => 'test.pdf',
            'content' => base64_encode('test content'),
        ]);

        $this->assertIsArray($attachment);
        $this->assertSame('123456789', $attachment['id']);
        $this->assertSame('test.pdf', $attachment['filename']);
    }

    public function test_it_can_delete_an_attachment(): void
    {
        $result = $this->client->purchaseInvoices()->deleteAttachment('123456789', '987654321');

        $this->assertTrue($result);
    }
}
