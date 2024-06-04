<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Api\ExternalSalesInvoices;

use Saloon\Http\Response;
use Sandorian\Moneybird\Api\Support\BaseEndpoint;

class ExternalSalesInvoiceAttachmentsEndpoint extends BaseEndpoint
{
    public function create(
        string $externalSalesInvoiceId,
        string $filePath,
        string $fileName,
    ): Response {
        $request = new CreateAttachmentForExternalSalesInvoiceRequest(
            externalSalesInvoiceId: $externalSalesInvoiceId,
            filePath: $filePath,
            fileName: $fileName,
        );

        return $this->client->send($request);
    }
}
