<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Tests\Api\SalesInvoices;

use Saloon\Http\Faking\MockResponse;
use Sandorian\Moneybird\Api\SalesInvoices\CreateSalesInvoiceRequest;
use Sandorian\Moneybird\Api\SalesInvoices\SalesInvoice;
use Sandorian\Moneybird\Tests\Api\BaseTestCase;

class SalesInvoicesEndpointTest extends BaseTestCase
{
    public function testCreateSalesInvoice(): void
    {
        $moneybird = $this->getMoneybirdClientWithMocks([
            CreateSalesInvoiceRequest::class => MockResponse::make(SalesInvoiceResponseStub::get(), 201),
        ]);

        $invoice = $moneybird->salesInvoices()->create([
            'contact_id' => '446241800633452147',
            'reference' => '30052',
            'details_attributes' => [
                [
                    'description' => 'Rocking Chair',
                    'price' => '129.95',
                ],
            ],
        ]);

        $this->assertInstanceOf(SalesInvoice::class, $invoice);
        $this->assertEquals('446241800633452147', $invoice->contact_id);
        $this->assertEquals('30052', $invoice->reference);
        $this->assertCount(1, $invoice->details);
        $this->assertEquals('Rocking Chair', $invoice->details[0]['description']);
        $this->assertEquals('129.95', $invoice->details[0]['price']);
    }
}
