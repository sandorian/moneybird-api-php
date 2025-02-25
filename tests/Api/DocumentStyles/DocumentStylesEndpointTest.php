<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Tests\Api\DocumentStyles;

use PHPUnit\Framework\TestCase;
use Saloon\Http\Faking\MockClient;
use Saloon\Http\Faking\MockResponse;
use Sandorian\Moneybird\Api\DocumentStyles\DocumentStyle;
use Sandorian\Moneybird\Api\DocumentStyles\GetDocumentStyleRequest;
use Sandorian\Moneybird\Api\DocumentStyles\GetDocumentStylesRequest;
use Sandorian\Moneybird\Api\MoneybirdApiClient;

class DocumentStylesEndpointTest extends TestCase
{
    private MoneybirdApiClient $client;

    private MockClient $mockClient;

    protected function setUp(): void
    {
        parent::setUp();

        $this->mockClient = new MockClient([
            GetDocumentStylesRequest::class => MockResponse::make(
                DocumentStylesResponseStub::getAll(),
                200
            ),
            GetDocumentStyleRequest::class => MockResponse::make(
                DocumentStylesResponseStub::get(),
                200
            ),
        ]);

        $this->client = new MoneybirdApiClient('test-token', 'test-administration-id');
        $this->client->withMockClient($this->mockClient);
    }

    public function test_it_can_get_all_document_styles(): void
    {
        $documentStyles = $this->client->documentStyles()->all();

        $this->assertCount(2, $documentStyles);
        $this->assertInstanceOf(DocumentStyle::class, $documentStyles[0]);
        $this->assertEquals('123456789', $documentStyles[0]->id);
        $this->assertEquals('Default Style', $documentStyles[0]->name);
        $this->assertEquals('987654321', $documentStyles[1]->id);
        $this->assertEquals('Alternative Style', $documentStyles[1]->name);
    }

    public function test_it_can_get_a_document_style(): void
    {
        $documentStyle = $this->client->documentStyles()->get('123456789');

        $this->assertInstanceOf(DocumentStyle::class, $documentStyle);
        $this->assertEquals('123456789', $documentStyle->id);
        $this->assertEquals('Default Style', $documentStyle->name);
        $this->assertEquals('123123123', $documentStyle->identity_id);
        $this->assertEquals(true, $documentStyle->default);
    }
}
