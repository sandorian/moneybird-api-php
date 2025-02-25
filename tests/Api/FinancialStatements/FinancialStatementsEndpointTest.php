<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Tests\Api\FinancialStatements;

use Saloon\Http\Faking\MockResponse;
use Sandorian\Moneybird\Api\FinancialStatements\CreateFinancialStatementRequest;
use Sandorian\Moneybird\Api\FinancialStatements\DeleteFinancialStatementRequest;
use Sandorian\Moneybird\Api\FinancialStatements\FinancialStatement;
use Sandorian\Moneybird\Api\FinancialStatements\GetFinancialStatementRequest;
use Sandorian\Moneybird\Api\FinancialStatements\GetFinancialStatementsRequest;
use Sandorian\Moneybird\Api\FinancialStatements\GetFinancialStatementsSynchronizationRequest;
use Sandorian\Moneybird\Api\FinancialStatements\PostFinancialStatementsSynchronizationRequest;
use Sandorian\Moneybird\Api\FinancialStatements\UpdateFinancialStatementRequest;
use Sandorian\Moneybird\Api\MoneybirdApiClient;
use Sandorian\Moneybird\Api\Support\IdVersion;
use Sandorian\Moneybird\Tests\Api\BaseTestCase;

class FinancialStatementsEndpointTest extends BaseTestCase
{
    private MoneybirdApiClient $client;

    protected function setUp(): void
    {
        parent::setUp();

        $this->client = $this->getMoneybirdClientWithMocks([
            GetFinancialStatementsRequest::class => MockResponse::make(FinancialStatementsResponseStub::getAll(), 200),
            GetFinancialStatementsSynchronizationRequest::class => MockResponse::make(FinancialStatementsResponseStub::synchronization(), 200),
            PostFinancialStatementsSynchronizationRequest::class => MockResponse::make(FinancialStatementsResponseStub::getAll(), 200),
            GetFinancialStatementRequest::class => MockResponse::make(FinancialStatementsResponseStub::get(), 200),
            CreateFinancialStatementRequest::class => MockResponse::make(FinancialStatementsResponseStub::create(), 201),
            UpdateFinancialStatementRequest::class => MockResponse::make(FinancialStatementsResponseStub::update(), 200),
            DeleteFinancialStatementRequest::class => MockResponse::make('', 204),
        ]);
    }

    public function test_it_can_get_all_financial_statements(): void
    {
        $financialStatements = $this->client->financialStatements()->all();

        $this->assertCount(2, $financialStatements);
        $this->assertContainsOnlyInstancesOf(FinancialStatement::class, $financialStatements);
        $this->assertSame('123456789', $financialStatements[0]->id);
        $this->assertSame('987654321', $financialStatements[1]->id);
    }

    public function test_it_can_get_financial_statements_synchronization(): void
    {
        $synchronization = $this->client->financialStatements()->synchronization();

        $this->assertCount(2, $synchronization);
        $this->assertContainsOnlyInstancesOf(IdVersion::class, $synchronization);
        $this->assertSame('123456789', $synchronization[0]->id);
        $this->assertSame('987654321', $synchronization[1]->id);
    }

    public function test_it_can_synchronize_financial_statements(): void
    {
        $financialStatements = $this->client->financialStatements()->synchronize(['123456789', '987654321']);

        $this->assertCount(2, $financialStatements);
        $this->assertContainsOnlyInstancesOf(FinancialStatement::class, $financialStatements);
        $this->assertSame('123456789', $financialStatements[0]->id);
        $this->assertSame('987654321', $financialStatements[1]->id);
    }

    public function test_it_can_get_a_financial_statement(): void
    {
        $financialStatement = $this->client->financialStatements()->get('123456789');

        $this->assertInstanceOf(FinancialStatement::class, $financialStatement);
        $this->assertSame('123456789', $financialStatement->id);
        $this->assertSame('Statement 2023-01', $financialStatement->reference);
    }

    public function test_it_can_create_a_financial_statement(): void
    {
        $financialStatement = $this->client->financialStatements()->create([
            'financial_account_id' => '456789123',
            'reference' => 'New Statement',
            'official_date' => '2023-03-31',
            'official_balance' => '2000.00',
        ]);

        $this->assertInstanceOf(FinancialStatement::class, $financialStatement);
        $this->assertSame('123456789', $financialStatement->id);
        $this->assertSame('New Statement', $financialStatement->reference);
    }

    public function test_it_can_update_a_financial_statement(): void
    {
        $financialStatement = $this->client->financialStatements()->update('123456789', [
            'reference' => 'Updated Statement',
        ]);

        $this->assertInstanceOf(FinancialStatement::class, $financialStatement);
        $this->assertSame('123456789', $financialStatement->id);
        $this->assertSame('Updated Statement', $financialStatement->reference);
    }

    public function test_it_can_delete_a_financial_statement(): void
    {
        $result = $this->client->financialStatements()->delete('123456789');

        $this->assertTrue($result);
    }
}
