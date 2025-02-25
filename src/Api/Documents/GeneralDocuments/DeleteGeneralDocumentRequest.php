<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Api\Documents\GeneralDocuments;

use Saloon\Http\Response;
use Sandorian\Moneybird\Api\Support\BaseJsonDeleteRequest;

class DeleteGeneralDocumentRequest extends BaseJsonDeleteRequest
{
    public function __construct(
        protected readonly string $generalDocumentId,
    ) {
        //
    }

    public function resolveEndpoint(): string
    {
        return 'documents/general_documents/'.$this->generalDocumentId;
    }

    public function createDtoFromResponse(Response $response): bool
    {
        return $response->status() === 204;
    }
}
