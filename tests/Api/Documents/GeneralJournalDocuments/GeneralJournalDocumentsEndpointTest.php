<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Tests\Api\Documents\GeneralJournalDocuments;

use Saloon\Http\Faking\MockResponse;
use Sandorian\Moneybird\Api\Documents\GeneralJournalDocuments\CreateGeneralJournalDocumentAttachmentRequest;
use Sandorian\Moneybird\Api\Documents\GeneralJournalDocuments\CreateGeneralJournalDocumentRequest;
use Sandorian\Moneybird\Api\Documents\GeneralJournalDocuments\DeleteGeneralJournalDocumentAttachmentRequest;
use Sandorian\Moneybird\Api\Documents\GeneralJournalDocuments\DeleteGeneralJournalDocumentRequest;
use Sandorian\Moneybird\Api\Documents\GeneralJournalDocuments\GeneralJournalDocument;
use Sandorian\Moneybird\Api\Documents\GeneralJournalDocuments\GetGeneralJournalDocumentRequest;
use Sandorian\Moneybird\Api\Documents\GeneralJournalDocuments\GetGeneralJournalDocumentsRequest;
use Sandorian\Moneybird\Api\Documents\GeneralJournalDocuments\GetGeneralJournalDocumentsSynchronizationRequest;
use Sandorian\Moneybird\Api\Documents\GeneralJournalDocuments\PostGeneralJournalDocumentsSynchronizationRequest;
use Sandorian\Moneybird\Api\Documents\GeneralJournalDocuments\UpdateGeneralJournalDocumentRequest;
use Sandorian\Moneybird\Api\MoneybirdApiClient;
use Sandorian\Moneybird\Api\Support\IdVersion;
use Sandorian\Moneybird\Tests\Api\BaseTestCase;

class GeneralJournalDocumentsEndpointTest extends BaseTestCase
{
    private MoneybirdApiClient $client;

    protected function setUp(): void
    {
        parent::setUp();

        $this->client = $this->getMoneybirdClientWithMocks([
            GetGeneralJournalDocumentsRequest::class => MockResponse::make(GeneralJournalDocumentsResponseStub::getAll(), 200),
            GetGeneralJournalDocumentsSynchronizationRequest::class => MockResponse::make(GeneralJournalDocumentsResponseStub::synchronization(), 200),
            PostGeneralJournalDocumentsSynchronizationRequest::class => MockResponse::make(GeneralJournalDocumentsResponseStub::getAll(), 200),
            GetGeneralJournalDocumentRequest::class => MockResponse::make(GeneralJournalDocumentsResponseStub::get(), 200),
            CreateGeneralJournalDocumentRequest::class => MockResponse::make(GeneralJournalDocumentsResponseStub::create(), 201),
            UpdateGeneralJournalDocumentRequest::class => MockResponse::make(GeneralJournalDocumentsResponseStub::update(), 200),
            DeleteGeneralJournalDocumentRequest::class => MockResponse::make('', 204),
            CreateGeneralJournalDocumentAttachmentRequest::class => MockResponse::make(GeneralJournalDocumentsResponseStub::createAttachment(), 201),
            DeleteGeneralJournalDocumentAttachmentRequest::class => MockResponse::make('', 204),
        ]);
    }

    public function test_it_can_get_all_general_journal_documents(): void
    {
        $generalJournalDocuments = $this->client->generalJournalDocuments()->all();

        $this->assertCount(2, $generalJournalDocuments);
        $this->assertContainsOnlyInstancesOf(GeneralJournalDocument::class, $generalJournalDocuments);
        $this->assertSame('123456789', $generalJournalDocuments[0]->id);
        $this->assertSame('987654321', $generalJournalDocuments[1]->id);
    }

    public function test_it_can_get_general_journal_documents_synchronization(): void
    {
        $synchronization = $this->client->generalJournalDocuments()->synchronization();

        $this->assertCount(2, $synchronization);
        $this->assertContainsOnlyInstancesOf(IdVersion::class, $synchronization);
        $this->assertSame('123456789', $synchronization[0]->id);
        $this->assertSame('987654321', $synchronization[1]->id);
    }

    public function test_it_can_synchronize_general_journal_documents(): void
    {
        $generalJournalDocuments = $this->client->generalJournalDocuments()->synchronize(['123456789', '987654321']);

        $this->assertCount(2, $generalJournalDocuments);
        $this->assertContainsOnlyInstancesOf(GeneralJournalDocument::class, $generalJournalDocuments);
        $this->assertSame('123456789', $generalJournalDocuments[0]->id);
        $this->assertSame('987654321', $generalJournalDocuments[1]->id);
    }

    public function test_it_can_get_a_general_journal_document(): void
    {
        $generalJournalDocument = $this->client->generalJournalDocuments()->get('123456789');

        $this->assertInstanceOf(GeneralJournalDocument::class, $generalJournalDocument);
        $this->assertSame('123456789', $generalJournalDocument->id);
        $this->assertSame('Test Journal Document', $generalJournalDocument->reference);
    }

    public function test_it_can_create_a_general_journal_document(): void
    {
        $generalJournalDocument = $this->client->generalJournalDocuments()->create([
            'reference' => 'New Journal Document',
            'date' => '2023-03-01',
        ]);

        $this->assertInstanceOf(GeneralJournalDocument::class, $generalJournalDocument);
        $this->assertSame('123456789', $generalJournalDocument->id);
        $this->assertSame('New Journal Document', $generalJournalDocument->reference);
    }

    public function test_it_can_update_a_general_journal_document(): void
    {
        $generalJournalDocument = $this->client->generalJournalDocuments()->update('123456789', [
            'reference' => 'Updated Journal Document',
        ]);

        $this->assertInstanceOf(GeneralJournalDocument::class, $generalJournalDocument);
        $this->assertSame('123456789', $generalJournalDocument->id);
        $this->assertSame('Updated Journal Document', $generalJournalDocument->reference);
    }

    public function test_it_can_delete_a_general_journal_document(): void
    {
        $result = $this->client->generalJournalDocuments()->delete('123456789');

        $this->assertTrue($result);
    }

    public function test_it_can_create_an_attachment(): void
    {
        $attachment = $this->client->generalJournalDocuments()->createAttachment('123456789', [
            'filename' => 'test.pdf',
            'content' => base64_encode('test content'),
        ]);

        $this->assertIsArray($attachment);
        $this->assertSame('123456789', $attachment['id']);
        $this->assertSame('test.pdf', $attachment['filename']);
    }

    public function test_it_can_delete_an_attachment(): void
    {
        $result = $this->client->generalJournalDocuments()->deleteAttachment('123456789', '987654321');

        $this->assertTrue($result);
    }
}
