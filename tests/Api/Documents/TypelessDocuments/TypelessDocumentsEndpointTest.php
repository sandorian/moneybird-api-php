<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Tests\Api\Documents\TypelessDocuments;

use Saloon\Http\Faking\MockResponse;
use Sandorian\Moneybird\Api\Documents\TypelessDocuments\CreateTypelessDocumentAttachmentRequest;
use Sandorian\Moneybird\Api\Documents\TypelessDocuments\CreateTypelessDocumentRequest;
use Sandorian\Moneybird\Api\Documents\TypelessDocuments\DeleteTypelessDocumentAttachmentRequest;
use Sandorian\Moneybird\Api\Documents\TypelessDocuments\DeleteTypelessDocumentRequest;
use Sandorian\Moneybird\Api\Documents\TypelessDocuments\GetTypelessDocumentRequest;
use Sandorian\Moneybird\Api\Documents\TypelessDocuments\GetTypelessDocumentsRequest;
use Sandorian\Moneybird\Api\Documents\TypelessDocuments\GetTypelessDocumentsSynchronizationRequest;
use Sandorian\Moneybird\Api\Documents\TypelessDocuments\PostTypelessDocumentsSynchronizationRequest;
use Sandorian\Moneybird\Api\Documents\TypelessDocuments\TypelessDocument;
use Sandorian\Moneybird\Api\Documents\TypelessDocuments\UpdateTypelessDocumentRequest;
use Sandorian\Moneybird\Api\MoneybirdApiClient;
use Sandorian\Moneybird\Api\Support\IdVersion;
use Sandorian\Moneybird\Tests\Api\BaseTestCase;

class TypelessDocumentsEndpointTest extends BaseTestCase
{
    private MoneybirdApiClient $client;

    protected function setUp(): void
    {
        parent::setUp();

        $this->client = $this->getMoneybirdClientWithMocks([
            GetTypelessDocumentsRequest::class => MockResponse::make(TypelessDocumentsResponseStub::getAll(), 200),
            GetTypelessDocumentsSynchronizationRequest::class => MockResponse::make(TypelessDocumentsResponseStub::synchronization(), 200),
            PostTypelessDocumentsSynchronizationRequest::class => MockResponse::make(TypelessDocumentsResponseStub::getAll(), 200),
            GetTypelessDocumentRequest::class => MockResponse::make(TypelessDocumentsResponseStub::get(), 200),
            CreateTypelessDocumentRequest::class => MockResponse::make(TypelessDocumentsResponseStub::create(), 201),
            UpdateTypelessDocumentRequest::class => MockResponse::make(TypelessDocumentsResponseStub::update(), 200),
            DeleteTypelessDocumentRequest::class => MockResponse::make('', 204),
            CreateTypelessDocumentAttachmentRequest::class => MockResponse::make(TypelessDocumentsResponseStub::createAttachment(), 201),
            DeleteTypelessDocumentAttachmentRequest::class => MockResponse::make('', 204),
        ]);
    }

    public function test_it_can_get_all_typeless_documents(): void
    {
        $typelessDocuments = $this->client->typelessDocuments()->all();

        $this->assertCount(2, $typelessDocuments);
        $this->assertContainsOnlyInstancesOf(TypelessDocument::class, $typelessDocuments);
        $this->assertSame('123456789', $typelessDocuments[0]->id);
        $this->assertSame('987654321', $typelessDocuments[1]->id);
    }

    public function test_it_can_get_typeless_documents_synchronization(): void
    {
        $synchronization = $this->client->typelessDocuments()->synchronization();

        $this->assertCount(2, $synchronization);
        $this->assertContainsOnlyInstancesOf(IdVersion::class, $synchronization);
        $this->assertSame('123456789', $synchronization[0]->id);
        $this->assertSame('987654321', $synchronization[1]->id);
    }

    public function test_it_can_synchronize_typeless_documents(): void
    {
        $typelessDocuments = $this->client->typelessDocuments()->synchronize(['123456789', '987654321']);

        $this->assertCount(2, $typelessDocuments);
        $this->assertContainsOnlyInstancesOf(TypelessDocument::class, $typelessDocuments);
        $this->assertSame('123456789', $typelessDocuments[0]->id);
        $this->assertSame('987654321', $typelessDocuments[1]->id);
    }

    public function test_it_can_get_a_typeless_document(): void
    {
        $typelessDocument = $this->client->typelessDocuments()->get('123456789');

        $this->assertInstanceOf(TypelessDocument::class, $typelessDocument);
        $this->assertSame('123456789', $typelessDocument->id);
        $this->assertSame('Test Typeless Document', $typelessDocument->reference);
    }

    public function test_it_can_create_a_typeless_document(): void
    {
        $typelessDocument = $this->client->typelessDocuments()->create([
            'reference' => 'New Typeless Document',
            'date' => '2023-03-01',
        ]);

        $this->assertInstanceOf(TypelessDocument::class, $typelessDocument);
        $this->assertSame('123456789', $typelessDocument->id);
        $this->assertSame('New Typeless Document', $typelessDocument->reference);
    }

    public function test_it_can_update_a_typeless_document(): void
    {
        $typelessDocument = $this->client->typelessDocuments()->update('123456789', [
            'reference' => 'Updated Typeless Document',
        ]);

        $this->assertInstanceOf(TypelessDocument::class, $typelessDocument);
        $this->assertSame('123456789', $typelessDocument->id);
        $this->assertSame('Updated Typeless Document', $typelessDocument->reference);
    }

    public function test_it_can_delete_a_typeless_document(): void
    {
        $result = $this->client->typelessDocuments()->delete('123456789');

        $this->assertTrue($result);
    }

    public function test_it_can_create_an_attachment(): void
    {
        $attachment = $this->client->typelessDocuments()->createAttachment('123456789', [
            'filename' => 'test.pdf',
            'content' => base64_encode('test content'),
        ]);

        $this->assertIsArray($attachment);
        $this->assertSame('123456789', $attachment['id']);
        $this->assertSame('test.pdf', $attachment['filename']);
    }

    public function test_it_can_delete_an_attachment(): void
    {
        $result = $this->client->typelessDocuments()->deleteAttachment('123456789', '987654321');

        $this->assertTrue($result);
    }
}
