<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Api\Documents\GeneralDocuments;

use Saloon\Http\Response;
use Sandorian\Moneybird\Api\Support\BaseJsonGetRequest;

class GetGeneralDocumentsRequest extends BaseJsonGetRequest
{
    public function resolveEndpoint(): string
    {
        return 'documents/general_documents';
    }

    /**
     * @return array<GeneralDocument>
     */
    public function createDtoFromResponse(Response $response): array
    {
        return array_map(
            fn (array $data) => GeneralDocument::createFromResponseData($data),
            $response->json()
        );
    }
}
