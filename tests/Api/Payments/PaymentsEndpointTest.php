<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Tests\Api\Payments;

use Saloon\Http\Faking\MockResponse;
use Sandorian\Moneybird\Api\MoneybirdApiClient;
use Sandorian\Moneybird\Api\Payments\GetPaymentRequest;
use Sandorian\Moneybird\Api\Payments\GetPaymentsRequest;
use Sandorian\Moneybird\Api\Payments\Payment;
use Sandorian\Moneybird\Tests\Api\BaseTestCase;

class PaymentsEndpointTest extends BaseTestCase
{
    private MoneybirdApiClient $client;

    protected function setUp(): void
    {
        parent::setUp();

        $this->client = $this->getMoneybirdClientWithMocks([
            GetPaymentsRequest::class => MockResponse::make(PaymentsResponseStub::getAll(), 200),
            GetPaymentRequest::class => MockResponse::make(PaymentsResponseStub::get(), 200),
        ]);
    }

    public function test_it_can_get_all_payments(): void
    {
        $payments = $this->client->payments()->all();

        $this->assertCount(2, $payments);
        $this->assertContainsOnlyInstancesOf(Payment::class, $payments);
        $this->assertSame('123456789', $payments[0]->id);
        $this->assertSame('987654321', $payments[1]->id);
    }

    public function test_it_can_get_a_payment(): void
    {
        $payment = $this->client->payments()->get('123456789');

        $this->assertInstanceOf(Payment::class, $payment);
        $this->assertSame('123456789', $payment->id);
        $this->assertSame('456789123', $payment->invoice_id);
    }
}
