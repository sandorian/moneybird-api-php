<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Api\Documents\TypelessDocuments;

use Saloon\Http\Response;
use Sandorian\Moneybird\Api\Support\BaseJsonDeleteRequest;

class DeleteTypelessDocumentRequest extends BaseJsonDeleteRequest
{
    public function __construct(
        protected readonly string $typelessDocumentId,
    ) {
        //
    }

    public function resolveEndpoint(): string
    {
        return 'documents/typeless_documents/'.$this->typelessDocumentId;
    }

    public function createDtoFromResponse(Response $response): bool
    {
        return $response->status() === 204;
    }
}
