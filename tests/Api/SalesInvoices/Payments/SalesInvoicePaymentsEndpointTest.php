<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Tests\Api\SalesInvoices\Payments;

use Saloon\Http\Faking\MockResponse;
use Sandorian\Moneybird\Api\SalesInvoices\Payments\RegisterSalesInvoicePaymentRequest;
use Sandorian\Moneybird\Api\SalesInvoices\Payments\SalesInvoicePayment;
use Sandorian\Moneybird\Tests\Api\BaseTestCase;

class SalesInvoicePaymentsEndpointTest extends BaseTestCase
{
    public function testRegisterPaymentForSalesInvoice(): void
    {
        $moneybird = $this->getMoneybirdClientWithMocks([
            RegisterSalesInvoicePaymentRequest::class => MockResponse::make(SalesInvoicePaymentResponseStub::get(), 201),
        ]);

        $payment = $moneybird->salesInvoices()->payments()->registerForSalesInvoiceId('446241800938587778', [
            'payment_date' => '2025-02-24',
            'price' => '129.95',
            'payment_method' => 'credit_card',
        ]);

        $this->assertInstanceOf(SalesInvoicePayment::class, $payment);
        $this->assertEquals('446241800938587779', $payment->id);
        $this->assertEquals('446241800938587778', $payment->invoice_id);
        $this->assertEquals('2025-02-24', $payment->payment_date);
        $this->assertEquals('129.95', $payment->price);
        $this->assertEquals('credit_card', $payment->payment_method);
    }
}
