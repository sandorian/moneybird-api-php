<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Tests\Api\ExternalSalesInvoices\Attachments;

use Saloon\Http\Faking\MockResponse;
use Sandorian\Moneybird\Api\ExternalSalesInvoices\Attachments\CreateAttachmentForExternalSalesInvoiceRequest;
use Sandorian\Moneybird\Tests\Api\BaseTestCase;

class ExternalSalesInvoiceAttachmentsEndpointTest extends BaseTestCase
{
    public function test_create_for_external_sales_invoice_id(): void
    {
        $moneybird = $this->getMoneybirdClientWithMocks([
            CreateAttachmentForExternalSalesInvoiceRequest::class => MockResponse::make([], 201),
        ]);

        $success = $moneybird->externalSalesInvoices()->attachments()->createForExternalSalesInvoiceId(
            '426664167757317770',
            'path_to_file',
            'filename',
        );

        $this->assertTrue($success);
    }
}
