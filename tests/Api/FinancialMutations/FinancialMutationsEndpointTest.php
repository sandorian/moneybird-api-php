<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Tests\Api\FinancialMutations;

use Saloon\Http\Faking\MockResponse;
use Saloon\Http\Response;
use Sandorian\Moneybird\Api\FinancialMutations\FinancialMutation;
use Sandorian\Moneybird\Api\FinancialMutations\GetFinancialMutationRequest;
use Sandorian\Moneybird\Api\FinancialMutations\GetFinancialMutationsRequest;
use Sandorian\Moneybird\Api\FinancialMutations\GetFinancialMutationsSynchronizationRequest;
use Sandorian\Moneybird\Api\FinancialMutations\LinkBookingToFinancialMutationRequest;
use Sandorian\Moneybird\Api\FinancialMutations\PostFinancialMutationsSynchronizationRequest;
use Sandorian\Moneybird\Api\FinancialMutations\UpdateFinancialMutationRequest;
use Sandorian\Moneybird\Api\MoneybirdApiClient;
use Sandorian\Moneybird\Api\Support\IdVersion;
use Sandorian\Moneybird\Tests\Api\BaseTestCase;

class FinancialMutationsEndpointTest extends BaseTestCase
{
    private MoneybirdApiClient $client;

    protected function setUp(): void
    {
        parent::setUp();

        $this->client = $this->getMoneybirdClientWithMocks([
            GetFinancialMutationsRequest::class => MockResponse::make(FinancialMutationsResponseStub::getAll(), 200),
            GetFinancialMutationsSynchronizationRequest::class => MockResponse::make(FinancialMutationsResponseStub::synchronization(), 200),
            PostFinancialMutationsSynchronizationRequest::class => MockResponse::make(FinancialMutationsResponseStub::getAll(), 200),
            GetFinancialMutationRequest::class => MockResponse::make(FinancialMutationsResponseStub::get(), 200),
            UpdateFinancialMutationRequest::class => MockResponse::make(FinancialMutationsResponseStub::update(), 200),
            LinkBookingToFinancialMutationRequest::class => MockResponse::make([], 200),
        ]);
    }

    public function test_it_can_get_all_financial_mutations(): void
    {
        $financialMutations = $this->client->financialMutations()->all();

        $this->assertCount(2, $financialMutations);
        $this->assertContainsOnlyInstancesOf(FinancialMutation::class, $financialMutations);
        $this->assertSame('123456789', $financialMutations[0]->id);
        $this->assertSame('987654321', $financialMutations[1]->id);
    }

    public function test_it_can_get_financial_mutations_synchronization(): void
    {
        $synchronization = $this->client->financialMutations()->synchronization();

        $this->assertCount(2, $synchronization);
        $this->assertContainsOnlyInstancesOf(IdVersion::class, $synchronization);
        $this->assertSame('123456789', $synchronization[0]->id);
        $this->assertSame('987654321', $synchronization[1]->id);
    }

    public function test_it_can_synchronize_financial_mutations(): void
    {
        $financialMutations = $this->client->financialMutations()->synchronize(['123456789', '987654321']);

        $this->assertCount(2, $financialMutations);
        $this->assertContainsOnlyInstancesOf(FinancialMutation::class, $financialMutations);
        $this->assertSame('123456789', $financialMutations[0]->id);
        $this->assertSame('987654321', $financialMutations[1]->id);
    }

    public function test_it_can_get_a_financial_mutation(): void
    {
        $financialMutation = $this->client->financialMutations()->get('123456789');

        $this->assertInstanceOf(FinancialMutation::class, $financialMutation);
        $this->assertSame('123456789', $financialMutation->id);
        $this->assertSame('Payment for invoice', $financialMutation->message);
    }

    public function test_it_can_update_a_financial_mutation(): void
    {
        $financialMutation = $this->client->financialMutations()->update('123456789', [
            'message' => 'Updated payment message',
        ]);

        $this->assertInstanceOf(FinancialMutation::class, $financialMutation);
        $this->assertSame('123456789', $financialMutation->id);
        $this->assertSame('Updated payment message', $financialMutation->message);
    }

    public function test_it_can_link_booking_to_financial_mutation(): void
    {
        $response = $this->client->financialMutations()->linkBooking('123456789', [
            'booking_type' => 'LedgerAccountBooking',
            'booking_id' => '123456',
            'price' => '100.00',
        ]);

        $this->assertInstanceOf(Response::class, $response);
    }
}
