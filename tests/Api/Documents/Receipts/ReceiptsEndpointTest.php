<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Tests\Api\Documents\Receipts;

use Saloon\Http\Faking\MockResponse;
use Sandorian\Moneybird\Api\Documents\Receipts\CreateReceiptAttachmentRequest;
use Sandorian\Moneybird\Api\Documents\Receipts\CreateReceiptRequest;
use Sandorian\Moneybird\Api\Documents\Receipts\DeleteReceiptAttachmentRequest;
use Sandorian\Moneybird\Api\Documents\Receipts\DeleteReceiptRequest;
use Sandorian\Moneybird\Api\Documents\Receipts\GetReceiptRequest;
use Sandorian\Moneybird\Api\Documents\Receipts\GetReceiptsRequest;
use Sandorian\Moneybird\Api\Documents\Receipts\GetReceiptsSynchronizationRequest;
use Sandorian\Moneybird\Api\Documents\Receipts\PostReceiptsSynchronizationRequest;
use Sandorian\Moneybird\Api\Documents\Receipts\Receipt;
use Sandorian\Moneybird\Api\Documents\Receipts\UpdateReceiptRequest;
use Sandorian\Moneybird\Api\MoneybirdApiClient;
use Sandorian\Moneybird\Api\Support\IdVersion;
use Sandorian\Moneybird\Tests\Api\BaseTestCase;

class ReceiptsEndpointTest extends BaseTestCase
{
    private MoneybirdApiClient $client;

    protected function setUp(): void
    {
        parent::setUp();

        $this->client = $this->getMoneybirdClientWithMocks([
            GetReceiptsRequest::class => MockResponse::make(ReceiptsResponseStub::getAll(), 200),
            GetReceiptsSynchronizationRequest::class => MockResponse::make(ReceiptsResponseStub::synchronization(), 200),
            PostReceiptsSynchronizationRequest::class => MockResponse::make(ReceiptsResponseStub::getAll(), 200),
            GetReceiptRequest::class => MockResponse::make(ReceiptsResponseStub::get(), 200),
            CreateReceiptRequest::class => MockResponse::make(ReceiptsResponseStub::create(), 201),
            UpdateReceiptRequest::class => MockResponse::make(ReceiptsResponseStub::update(), 200),
            DeleteReceiptRequest::class => MockResponse::make('', 204),
            CreateReceiptAttachmentRequest::class => MockResponse::make(ReceiptsResponseStub::createAttachment(), 201),
            DeleteReceiptAttachmentRequest::class => MockResponse::make('', 204),
        ]);
    }

    public function test_it_can_get_all_receipts(): void
    {
        $receipts = $this->client->receipts()->all();

        $this->assertCount(2, $receipts);
        $this->assertContainsOnlyInstancesOf(Receipt::class, $receipts);
        $this->assertSame('123456789', $receipts[0]->id);
        $this->assertSame('987654321', $receipts[1]->id);
    }

    public function test_it_can_get_receipts_synchronization(): void
    {
        $synchronization = $this->client->receipts()->synchronization();

        $this->assertCount(2, $synchronization);
        $this->assertContainsOnlyInstancesOf(IdVersion::class, $synchronization);
        $this->assertSame('123456789', $synchronization[0]->id);
        $this->assertSame('987654321', $synchronization[1]->id);
    }

    public function test_it_can_synchronize_receipts(): void
    {
        $receipts = $this->client->receipts()->synchronize(['123456789', '987654321']);

        $this->assertCount(2, $receipts);
        $this->assertContainsOnlyInstancesOf(Receipt::class, $receipts);
        $this->assertSame('123456789', $receipts[0]->id);
        $this->assertSame('987654321', $receipts[1]->id);
    }

    public function test_it_can_get_a_receipt(): void
    {
        $receipt = $this->client->receipts()->get('123456789');

        $this->assertInstanceOf(Receipt::class, $receipt);
        $this->assertSame('123456789', $receipt->id);
        $this->assertSame('Test Receipt', $receipt->reference);
    }

    public function test_it_can_create_a_receipt(): void
    {
        $receipt = $this->client->receipts()->create([
            'reference' => 'New Receipt',
            'date' => '2023-03-01',
        ]);

        $this->assertInstanceOf(Receipt::class, $receipt);
        $this->assertSame('123456789', $receipt->id);
        $this->assertSame('New Receipt', $receipt->reference);
    }

    public function test_it_can_update_a_receipt(): void
    {
        $receipt = $this->client->receipts()->update('123456789', [
            'reference' => 'Updated Receipt',
        ]);

        $this->assertInstanceOf(Receipt::class, $receipt);
        $this->assertSame('123456789', $receipt->id);
        $this->assertSame('Updated Receipt', $receipt->reference);
    }

    public function test_it_can_delete_a_receipt(): void
    {
        $result = $this->client->receipts()->delete('123456789');

        $this->assertTrue($result);
    }

    public function test_it_can_create_an_attachment(): void
    {
        $attachment = $this->client->receipts()->createAttachment('123456789', [
            'filename' => 'test.pdf',
            'content' => base64_encode('test content'),
        ]);

        $this->assertIsArray($attachment);
        $this->assertSame('123456789', $attachment['id']);
        $this->assertSame('test.pdf', $attachment['filename']);
    }

    public function test_it_can_delete_an_attachment(): void
    {
        $result = $this->client->receipts()->deleteAttachment('123456789', '987654321');

        $this->assertTrue($result);
    }
}
