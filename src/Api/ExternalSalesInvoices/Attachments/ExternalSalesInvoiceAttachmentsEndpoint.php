<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Api\ExternalSalesInvoices\Attachments;

use Saloon\Http\Response;
use Sandorian\Moneybird\Api\Support\BaseEndpoint;

class ExternalSalesInvoiceAttachmentsEndpoint extends BaseEndpoint
{
    public function createForExternalSalesInvoiceId(
        string $externalSalesInvoiceId,
        string $filePath,
        string $fileName,
    ): bool {
        $request = new CreateAttachmentForExternalSalesInvoiceRequest(
            externalSalesInvoiceId: $externalSalesInvoiceId,
            filePath: $filePath,
            fileName: $fileName,
        );

        return $this->client->send($request)->successful();
    }
}
