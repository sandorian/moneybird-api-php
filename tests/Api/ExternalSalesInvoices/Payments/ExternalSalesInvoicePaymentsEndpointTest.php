<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Tests\Api\ExternalSalesInvoices\Payments;

use Saloon\Http\Faking\MockResponse;
use Sandorian\Moneybird\Api\ExternalSalesInvoices\Payments\CreatePaymentForExternalSalesInvoiceRequest;
use Sandorian\Moneybird\Api\ExternalSalesInvoices\Payments\ExternalSalesInvoicePayment;
use Sandorian\Moneybird\Tests\Api\BaseTestCase;

class ExternalSalesInvoicePaymentsEndpointTest extends BaseTestCase
{
    public function test_create_for_external_sales_invoice_id(): void
    {
        $moneybird = $this->getMoneybirdClientWithMocks([
            CreatePaymentForExternalSalesInvoiceRequest::class => MockResponse::make(ExternalSalesInvoicePaymentResponseStub::get(), 201),
        ]);

        $payment = $moneybird
            ->externalSalesInvoices()
            ->payments()
            ->createForExternalSalesInvoiceId('426664167757317770', [
                'price' => '121.0',
                'price_base' => '121.0',
                'payment_date' => '2024-07-16',
            ]);

        $this->assertInstanceOf(ExternalSalesInvoicePayment::class, $payment);
    }
}
