<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Api\Documents\GeneralDocuments;

use Saloon\Http\Response;
use Sandorian\Moneybird\Api\Support\BaseJsonDeleteRequest;

class DeleteGeneralDocumentAttachmentRequest extends BaseJsonDeleteRequest
{
    public function __construct(
        protected readonly string $generalDocumentId,
        protected readonly string $attachmentId,
    ) {
        //
    }

    public function resolveEndpoint(): string
    {
        return 'documents/general_documents/'.$this->generalDocumentId.'/attachments/'.$this->attachmentId;
    }

    public function createDtoFromResponse(Response $response): bool
    {
        return $response->status() === 204;
    }
}
