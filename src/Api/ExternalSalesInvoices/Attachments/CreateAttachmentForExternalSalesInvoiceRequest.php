<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Api\ExternalSalesInvoices\Attachments;

use Saloon\Contracts\Body\HasBody;
use Saloon\Data\MultipartValue;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasMultipartBody;

class CreateAttachmentForExternalSalesInvoiceRequest extends Request implements HasBody
{
    use HasMultipartBody;

    protected Method $method = Method::POST;

    public function __construct(
        protected readonly string $externalSalesInvoiceId,
        protected readonly string $filePath,
        protected readonly string $fileName,
    ) {
        //
    }

    public function resolveEndpoint(): string
    {
        return 'external_sales_invoices/'.$this->externalSalesInvoiceId.'./attachment.json';
    }

    public function defaultBody(): array
    {
        return [
            new MultipartValue(
                name: 'file', // Required: the name of the multipart value
                value: $this->filePath, // Required: Absolute path or file stream
                filename: $this->fileName, // Optional: File name
                //headers: [], // Optional: Headers to be sent with the individual value
            ),
        ];
    }

    public function createDtoFromResponse(Response $response): ExternalSalesInvoiceAttachment
    {
        return ExternalSalesInvoiceAttachment::createFromResponseData($response->json());
    }
}
