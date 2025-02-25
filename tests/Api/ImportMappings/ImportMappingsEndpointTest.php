<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Tests\Api\ImportMappings;

use Saloon\Http\Faking\MockResponse;
use Sandorian\Moneybird\Api\ImportMappings\CreateImportMappingRequest;
use Sandorian\Moneybird\Api\ImportMappings\DeleteImportMappingRequest;
use Sandorian\Moneybird\Api\ImportMappings\GetImportMappingRequest;
use Sandorian\Moneybird\Api\ImportMappings\GetImportMappingsRequest;
use Sandorian\Moneybird\Api\ImportMappings\ImportMapping;
use Sandorian\Moneybird\Api\ImportMappings\UpdateImportMappingRequest;
use Sandorian\Moneybird\Api\MoneybirdApiClient;
use Sandorian\Moneybird\Tests\Api\BaseTestCase;

class ImportMappingsEndpointTest extends BaseTestCase
{
    private MoneybirdApiClient $client;

    protected function setUp(): void
    {
        parent::setUp();

        $this->client = $this->getMoneybirdClientWithMocks([
            GetImportMappingsRequest::class => MockResponse::make(ImportMappingsResponseStub::getAll(), 200),
            GetImportMappingRequest::class => MockResponse::make(ImportMappingsResponseStub::get(), 200),
            CreateImportMappingRequest::class => MockResponse::make(ImportMappingsResponseStub::create(), 201),
            UpdateImportMappingRequest::class => MockResponse::make(ImportMappingsResponseStub::update(), 200),
            DeleteImportMappingRequest::class => MockResponse::make('', 204),
        ]);
    }

    public function test_it_can_get_all_import_mappings(): void
    {
        $importMappings = $this->client->importMappings()->all();

        $this->assertCount(2, $importMappings);
        $this->assertContainsOnlyInstancesOf(ImportMapping::class, $importMappings);
        $this->assertSame('123456789', $importMappings[0]->id);
        $this->assertSame('987654321', $importMappings[1]->id);
    }

    public function test_it_can_get_an_import_mapping(): void
    {
        $importMapping = $this->client->importMappings()->get('123456789');

        $this->assertInstanceOf(ImportMapping::class, $importMapping);
        $this->assertSame('123456789', $importMapping->id);
        $this->assertSame('Import Mapping 1', $importMapping->name);
    }

    public function test_it_can_create_an_import_mapping(): void
    {
        $importMapping = $this->client->importMappings()->create([
            'name' => 'New Import Mapping',
            'entity_type' => 'SalesInvoice',
            'default_ledger_account_id' => '456789123',
            'default_tax_rate_id' => '789123456',
        ]);

        $this->assertInstanceOf(ImportMapping::class, $importMapping);
        $this->assertSame('123456789', $importMapping->id);
        $this->assertSame('New Import Mapping', $importMapping->name);
    }

    public function test_it_can_update_an_import_mapping(): void
    {
        $importMapping = $this->client->importMappings()->update('123456789', [
            'name' => 'Updated Import Mapping',
        ]);

        $this->assertInstanceOf(ImportMapping::class, $importMapping);
        $this->assertSame('123456789', $importMapping->id);
        $this->assertSame('Updated Import Mapping', $importMapping->name);
    }

    public function test_it_can_delete_an_import_mapping(): void
    {
        $result = $this->client->importMappings()->delete('123456789');

        $this->assertTrue($result);
    }
}
