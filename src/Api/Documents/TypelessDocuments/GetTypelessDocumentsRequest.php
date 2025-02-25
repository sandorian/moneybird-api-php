<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Api\Documents\TypelessDocuments;

use Saloon\Http\Response;
use Sandorian\Moneybird\Api\Support\BaseJsonGetRequest;

class GetTypelessDocumentsRequest extends BaseJsonGetRequest
{
    public function resolveEndpoint(): string
    {
        return 'documents/typeless_documents';
    }

    /**
     * @return array<TypelessDocument>
     */
    public function createDtoFromResponse(Response $response): array
    {
        return array_map(
            fn (array $data) => TypelessDocument::createFromResponseData($data),
            $response->json()
        );
    }
}
