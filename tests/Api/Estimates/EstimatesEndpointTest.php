<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Tests\Api\Estimates;

use Saloon\Http\Faking\MockResponse;
use Sandorian\Moneybird\Api\Estimates\ChangeEstimateStateRequest;
use Sandorian\Moneybird\Api\Estimates\CreateEstimateRequest;
use Sandorian\Moneybird\Api\Estimates\DeleteEstimateRequest;
use Sandorian\Moneybird\Api\Estimates\DuplicateEstimateRequest;
use Sandorian\Moneybird\Api\Estimates\Estimate;
use Sandorian\Moneybird\Api\Estimates\GetEstimateRequest;
use Sandorian\Moneybird\Api\Estimates\GetEstimatesRequest;
use Sandorian\Moneybird\Api\Estimates\GetEstimatesSynchronizationRequest;
use Sandorian\Moneybird\Api\Estimates\GetSendEstimateEmailTemplateRequest;
use Sandorian\Moneybird\Api\Estimates\PostEstimatesSynchronizationRequest;
use Sandorian\Moneybird\Api\Estimates\SendEstimateEmailRequest;
use Sandorian\Moneybird\Api\Estimates\UpdateEstimateRequest;
use Sandorian\Moneybird\Api\MoneybirdApiClient;
use Sandorian\Moneybird\Api\Support\IdVersion;
use Sandorian\Moneybird\Tests\Api\BaseTestCase;

class EstimatesEndpointTest extends BaseTestCase
{
    private MoneybirdApiClient $client;

    protected function setUp(): void
    {
        parent::setUp();

        $this->client = $this->getMoneybirdClientWithMocks([
            GetEstimatesRequest::class => MockResponse::make(EstimatesResponseStub::getAll(), 200),
            GetEstimatesSynchronizationRequest::class => MockResponse::make(EstimatesResponseStub::synchronization(), 200),
            PostEstimatesSynchronizationRequest::class => MockResponse::make(EstimatesResponseStub::getAll(), 200),
            GetEstimateRequest::class => MockResponse::make(EstimatesResponseStub::get(), 200),
            CreateEstimateRequest::class => MockResponse::make(EstimatesResponseStub::create(), 201),
            UpdateEstimateRequest::class => MockResponse::make(EstimatesResponseStub::update(), 200),
            DeleteEstimateRequest::class => MockResponse::make('', 204),
            ChangeEstimateStateRequest::class => MockResponse::make(EstimatesResponseStub::changeState(), 200),
            SendEstimateEmailRequest::class => MockResponse::make(EstimatesResponseStub::sendEmail(), 200),
            GetSendEstimateEmailTemplateRequest::class => MockResponse::make(EstimatesResponseStub::getSendEmailTemplate(), 200),
            DuplicateEstimateRequest::class => MockResponse::make(EstimatesResponseStub::duplicate(), 201),
        ]);
    }

    public function test_it_can_get_all_estimates(): void
    {
        $estimates = $this->client->estimates()->all();

        $this->assertCount(2, $estimates);
        $this->assertContainsOnlyInstancesOf(Estimate::class, $estimates);
        $this->assertSame('123456789', $estimates[0]->id);
        $this->assertSame('987654321', $estimates[1]->id);
    }

    public function test_it_can_get_estimates_synchronization(): void
    {
        $synchronization = $this->client->estimates()->synchronization();

        $this->assertCount(2, $synchronization);
        $this->assertContainsOnlyInstancesOf(IdVersion::class, $synchronization);
        $this->assertSame('123456789', $synchronization[0]->id);
        $this->assertSame('987654321', $synchronization[1]->id);
    }

    public function test_it_can_synchronize_estimates(): void
    {
        $estimates = $this->client->estimates()->synchronize(['123456789', '987654321']);

        $this->assertCount(2, $estimates);
        $this->assertContainsOnlyInstancesOf(Estimate::class, $estimates);
        $this->assertSame('123456789', $estimates[0]->id);
        $this->assertSame('987654321', $estimates[1]->id);
    }

    public function test_it_can_get_an_estimate(): void
    {
        $estimate = $this->client->estimates()->get('123456789');

        $this->assertInstanceOf(Estimate::class, $estimate);
        $this->assertSame('123456789', $estimate->id);
        $this->assertSame('Test Estimate', $estimate->reference);
    }

    public function test_it_can_create_an_estimate(): void
    {
        $estimate = $this->client->estimates()->create([
            'contact_id' => '456789123',
            'reference' => 'New Estimate',
            'estimate_date' => '2023-03-01',
        ]);

        $this->assertInstanceOf(Estimate::class, $estimate);
        $this->assertSame('123456789', $estimate->id);
        $this->assertSame('New Estimate', $estimate->reference);
    }

    public function test_it_can_update_an_estimate(): void
    {
        $estimate = $this->client->estimates()->update('123456789', [
            'reference' => 'Updated Estimate',
        ]);

        $this->assertInstanceOf(Estimate::class, $estimate);
        $this->assertSame('123456789', $estimate->id);
        $this->assertSame('Updated Estimate', $estimate->reference);
    }

    public function test_it_can_delete_an_estimate(): void
    {
        $result = $this->client->estimates()->delete('123456789');

        $this->assertTrue($result);
    }

    public function test_it_can_change_estimate_state(): void
    {
        $estimate = $this->client->estimates()->changeState('123456789', 'open');

        $this->assertInstanceOf(Estimate::class, $estimate);
        $this->assertSame('123456789', $estimate->id);
        $this->assertSame('open', $estimate->state);
    }

    public function test_it_can_send_estimate_by_email(): void
    {
        $estimate = $this->client->estimates()->sendEmail('123456789', [
            'email_address' => 'test@example.com',
            'subject' => 'Estimate EST001',
            'message' => 'Please find your estimate attached.',
        ]);

        $this->assertInstanceOf(Estimate::class, $estimate);
        $this->assertSame('123456789', $estimate->id);
        $this->assertSame('open', $estimate->state);
    }

    public function test_it_can_get_send_estimate_email_template(): void
    {
        $template = $this->client->estimates()->getSendEmailTemplate('123456789');

        $this->assertIsArray($template);
        $this->assertSame('test@example.com', $template['email_address']);
        $this->assertSame('Estimate EST001', $template['subject']);
    }

    public function test_it_can_duplicate_an_estimate(): void
    {
        $estimate = $this->client->estimates()->duplicate('123456789');

        $this->assertInstanceOf(Estimate::class, $estimate);
        $this->assertSame('987654321', $estimate->id);
        $this->assertSame('Test Estimate (copy)', $estimate->reference);
        $this->assertSame('123456789', $estimate->original_estimate_id);
    }
}
