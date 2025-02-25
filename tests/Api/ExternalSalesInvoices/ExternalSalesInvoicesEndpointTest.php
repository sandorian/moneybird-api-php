<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Tests\Api\ExternalSalesInvoices;

use Saloon\Http\Faking\MockResponse;
use Saloon\PaginationPlugin\Paginator;
use Sandorian\Moneybird\Api\ExternalSalesInvoices\CreateExternalSalesInvoiceRequest;
use Sandorian\Moneybird\Api\ExternalSalesInvoices\DeleteExternalSalesInvoiceRequest;
use Sandorian\Moneybird\Api\ExternalSalesInvoices\ExternalSalesInvoice;
use Sandorian\Moneybird\Api\ExternalSalesInvoices\GetExternalSalesInvoiceRequest;
use Sandorian\Moneybird\Api\ExternalSalesInvoices\GetExternalSalesInvoicesSynchronizationRequest;
use Sandorian\Moneybird\Api\ExternalSalesInvoices\SynchronizeExternalSalesInvoicesRequest;
use Sandorian\Moneybird\Api\ExternalSalesInvoices\UpdateExternalSalesInvoiceRequest;
use Sandorian\Moneybird\Tests\Api\BaseTestCase;

class ExternalSalesInvoicesEndpointTest extends BaseTestCase
{
    public function test_create_external_sales_invoice(): void
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

    public function test_paginate_external_sales_invoices(): void
    {
        $moneybird = $this->getMoneybirdClient();

        $paginator = $moneybird->externalSalesInvoices()->paginate();

        $this->assertInstanceOf(Paginator::class, $paginator);
        $this->assertEquals(0, $paginator->getCurrentPage());
    }

    public function test_get_external_sales_invoice(): void
    {
        $moneybird = $this->getMoneybirdClientWithMocks([
            GetExternalSalesInvoiceRequest::class => MockResponse::make(ExternalSalesInvoiceResponseStub::get(), 200),
        ]);

        $invoice = $moneybird->externalSalesInvoices()->get('426664163463398887');

        $this->assertInstanceOf(ExternalSalesInvoice::class, $invoice);
        $this->assertEquals('426664163463398887', $invoice->id);
    }

    public function test_update_external_sales_invoice(): void
    {
        $moneybird = $this->getMoneybirdClientWithMocks([
            UpdateExternalSalesInvoiceRequest::class => MockResponse::make(ExternalSalesInvoiceResponseStub::get(), 200),
        ]);

        $invoice = $moneybird->externalSalesInvoices()->update('426664163463398887', [
            'reference' => 'Updated Invoice 1',
        ]);

        $this->assertInstanceOf(ExternalSalesInvoice::class, $invoice);
        $this->assertEquals('426664163463398887', $invoice->id);
    }

    public function test_delete_external_sales_invoice(): void
    {
        $moneybird = $this->getMoneybirdClientWithMocks([
            DeleteExternalSalesInvoiceRequest::class => MockResponse::make('', 204),
        ]);

        $moneybird->externalSalesInvoices()->delete('426664163463398887');

        $this->expectNotToPerformAssertions();
    }

    public function test_get_synchronization(): void
    {
        $moneybird = $this->getMoneybirdClientWithMocks([
            GetExternalSalesInvoicesSynchronizationRequest::class => MockResponse::make([
                ['id' => '426664163463398887', 'version' => 1721118676],
                ['id' => '426664163463398888', 'version' => 1721118677],
            ], 200),
        ]);

        $result = $moneybird->externalSalesInvoices()->getSynchronization();

        $this->assertIsArray($result);
        $this->assertCount(2, $result);
        $this->assertEquals('426664163463398887', $result[0]['id']);
    }

    public function test_synchronize(): void
    {
        $moneybird = $this->getMoneybirdClientWithMocks([
            SynchronizeExternalSalesInvoicesRequest::class => MockResponse::make([
                ExternalSalesInvoiceResponseStub::get(),
            ], 200),
        ]);

        $result = $moneybird->externalSalesInvoices()->synchronize(['426664163463398887']);

        $this->assertIsArray($result);
        $this->assertCount(1, $result);
        $this->assertEquals('426664163463398887', $result[0]['id']);
    }
}
