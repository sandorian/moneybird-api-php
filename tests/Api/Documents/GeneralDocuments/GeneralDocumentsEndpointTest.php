<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Tests\Api\Documents\GeneralDocuments;

use PHPUnit\Framework\TestCase;
use Saloon\Http\Faking\MockClient;
use Saloon\Http\Faking\MockResponse;
use Sandorian\Moneybird\Api\Documents\GeneralDocuments\CreateGeneralDocumentAttachmentRequest;
use Sandorian\Moneybird\Api\Documents\GeneralDocuments\CreateGeneralDocumentRequest;
use Sandorian\Moneybird\Api\Documents\GeneralDocuments\DeleteGeneralDocumentAttachmentRequest;
use Sandorian\Moneybird\Api\Documents\GeneralDocuments\DeleteGeneralDocumentRequest;
use Sandorian\Moneybird\Api\Documents\GeneralDocuments\GeneralDocument;
use Sandorian\Moneybird\Api\Documents\GeneralDocuments\GetGeneralDocumentRequest;
use Sandorian\Moneybird\Api\Documents\GeneralDocuments\GetGeneralDocumentsRequest;
use Sandorian\Moneybird\Api\Documents\GeneralDocuments\GetGeneralDocumentsSynchronizationRequest;
use Sandorian\Moneybird\Api\Documents\GeneralDocuments\PostGeneralDocumentsSynchronizationRequest;
use Sandorian\Moneybird\Api\Documents\GeneralDocuments\UpdateGeneralDocumentRequest;
use Sandorian\Moneybird\Api\MoneybirdApiClient;
use Sandorian\Moneybird\Api\Support\IdVersion;

class GeneralDocumentsEndpointTest extends TestCase
{
    private MoneybirdApiClient $client;

    private MockClient $mockClient;

    protected function setUp(): void
    {
        parent::setUp();

        $this->mockClient = new MockClient([
            GetGeneralDocumentsRequest::class => MockResponse::make(
                GeneralDocumentsResponseStub::getAll(),
                200
            ),
            GetGeneralDocumentRequest::class => MockResponse::make(
                GeneralDocumentsResponseStub::get(),
                200
            ),
            GetGeneralDocumentsSynchronizationRequest::class => MockResponse::make(
                GeneralDocumentsResponseStub::synchronization(),
                200
            ),
            PostGeneralDocumentsSynchronizationRequest::class => MockResponse::make(
                GeneralDocumentsResponseStub::getAll(),
                200
            ),
            CreateGeneralDocumentRequest::class => MockResponse::make(
                GeneralDocumentsResponseStub::create(),
                201
            ),
            UpdateGeneralDocumentRequest::class => MockResponse::make(
                GeneralDocumentsResponseStub::update(),
                200
            ),
            DeleteGeneralDocumentRequest::class => MockResponse::make(
                '',
                204
            ),
            CreateGeneralDocumentAttachmentRequest::class => MockResponse::make(
                GeneralDocumentsResponseStub::createAttachment(),
                201
            ),
            DeleteGeneralDocumentAttachmentRequest::class => MockResponse::make(
                '',
                204
            ),
        ]);

        $this->client = new MoneybirdApiClient('test-token', 'test-administration-id');
        $this->client->withMockClient($this->mockClient);
    }

    public function test_it_can_get_all_general_documents(): void
    {
        $generalDocuments = $this->client->generalDocuments()->all();

        $this->assertCount(2, $generalDocuments);
        $this->assertInstanceOf(GeneralDocument::class, $generalDocuments[0]);
        $this->assertEquals('123456789', $generalDocuments[0]->id);
        $this->assertEquals('Test Document', $generalDocuments[0]->reference);
        $this->assertEquals('987654321', $generalDocuments[1]->id);
        $this->assertEquals('Another Document', $generalDocuments[1]->reference);
    }

    public function test_it_can_get_a_general_document(): void
    {
        $generalDocument = $this->client->generalDocuments()->get('123456789');

        $this->assertInstanceOf(GeneralDocument::class, $generalDocument);
        $this->assertEquals('123456789', $generalDocument->id);
        $this->assertEquals('Test Document', $generalDocument->reference);
        $this->assertEquals('456789123', $generalDocument->contact_id);
    }

    public function test_it_can_get_general_documents_synchronization(): void
    {
        $synchronization = $this->client->generalDocuments()->synchronization();

        $this->assertCount(2, $synchronization);
        $this->assertInstanceOf(IdVersion::class, $synchronization[0]);
        $this->assertEquals('123456789', $synchronization[0]->id);
        $this->assertEquals(1, $synchronization[0]->version);
    }

    public function test_it_can_synchronize_general_documents(): void
    {
        $generalDocuments = $this->client->generalDocuments()->synchronize(['123456789', '987654321']);

        $this->assertCount(2, $generalDocuments);
        $this->assertInstanceOf(GeneralDocument::class, $generalDocuments[0]);
        $this->assertEquals('123456789', $generalDocuments[0]->id);
    }

    public function test_it_can_create_a_general_document(): void
    {
        $generalDocumentData = [
            'contact_id' => '456789123',
            'reference' => 'New Document',
            'date' => '2023-03-01',
            'due_date' => '2023-04-01',
        ];

        $generalDocument = $this->client->generalDocuments()->create($generalDocumentData);

        $this->assertInstanceOf(GeneralDocument::class, $generalDocument);
        $this->assertEquals('123456789', $generalDocument->id);
        $this->assertEquals('New Document', $generalDocument->reference);
    }

    public function test_it_can_update_a_general_document(): void
    {
        $generalDocumentData = [
            'reference' => 'Updated Document',
        ];

        $generalDocument = $this->client->generalDocuments()->update('123456789', $generalDocumentData);

        $this->assertInstanceOf(GeneralDocument::class, $generalDocument);
        $this->assertEquals('123456789', $generalDocument->id);
        $this->assertEquals('Updated Document', $generalDocument->reference);
    }

    public function test_it_can_delete_a_general_document(): void
    {
        $result = $this->client->generalDocuments()->delete('123456789');

        $this->assertTrue($result);
    }

    public function test_it_can_create_an_attachment(): void
    {
        $attachmentData = [
            'filename' => 'test.pdf',
            'content' => base64_encode('test content'),
        ];

        $result = $this->client->generalDocuments()->createAttachment('123456789', $attachmentData);

        $this->assertIsArray($result);
        $this->assertEquals('123456789', $result['id']);
        $this->assertEquals('test.pdf', $result['filename']);
    }

    public function test_it_can_delete_an_attachment(): void
    {
        $result = $this->client->generalDocuments()->deleteAttachment('123456789', '123456789');

        $this->assertTrue($result);
    }
}
