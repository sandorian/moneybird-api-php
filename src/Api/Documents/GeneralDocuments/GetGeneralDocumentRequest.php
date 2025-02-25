<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Api\Documents\GeneralDocuments;

use Saloon\Http\Response;
use Sandorian\Moneybird\Api\Support\BaseJsonGetRequest;

class GetGeneralDocumentRequest extends BaseJsonGetRequest
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

    public function createDtoFromResponse(Response $response): GeneralDocument
    {
        return GeneralDocument::createFromResponseData($response->json());
    }
}
