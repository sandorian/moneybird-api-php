<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Api\Documents\TypelessDocuments;

use Saloon\Http\Response;
use Sandorian\Moneybird\Api\Support\BaseJsonGetRequest;

class GetTypelessDocumentRequest extends BaseJsonGetRequest
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

    public function createDtoFromResponse(Response $response): TypelessDocument
    {
        return TypelessDocument::createFromResponseData($response->json());
    }
}
