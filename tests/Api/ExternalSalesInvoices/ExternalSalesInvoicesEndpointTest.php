<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Tests\Api\ExternalSalesInvoices;

use Saloon\Http\Faking\MockResponse;
use Saloon\PaginationPlugin\Paginator;
use Sandorian\Moneybird\Api\ExternalSalesInvoices\CreateExternalSalesInvoiceRequest;
use Sandorian\Moneybird\Api\ExternalSalesInvoices\ExternalSalesInvoice;
use Sandorian\Moneybird\Tests\Api\BaseTestCase;

class ExternalSalesInvoicesEndpointTest extends BaseTestCase
{
    /** @test */
    public function testCreateExternalSalesInvoice(): void
    {
        $moneybird = $this->getMoneybirdClientWithMocks([
            CreateExternalSalesInvoiceRequest::class => MockResponse::make(ExternalSalesInvoiceResponseStub::get(), 201),
        ]);

        $invoice = $moneybird->externalSalesInvoices()->create([
            'contact_id' => 426664163441378788,
        ]);

        $this->assertInstanceOf(ExternalSalesInvoice::class, $invoice);
        $this->assertEquals(426664163441378788, $invoice->contact_id);
    }

    /** @test */
    public function testPaginateExternalSalesInvoices(): void
    {
        $moneybird = $this->getMoneybirdClient();

        $paginator = $moneybird->externalSalesInvoices()->paginate();

        $this->assertInstanceOf(Paginator::class, $paginator);
        $this->assertEquals(0, $paginator->getCurrentPage());
    }
}
