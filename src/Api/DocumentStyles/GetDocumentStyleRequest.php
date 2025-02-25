<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Api\DocumentStyles;

use Saloon\Http\Response;
use Sandorian\Moneybird\Api\Support\BaseJsonGetRequest;

class GetDocumentStyleRequest extends BaseJsonGetRequest
{
    public function __construct(
        protected readonly string $documentStyleId,
    ) {
        //
    }

    public function resolveEndpoint(): string
    {
        return 'document_styles/'.$this->documentStyleId;
    }

    public function createDtoFromResponse(Response $response): DocumentStyle
    {
        return DocumentStyle::createFromResponseData($response->json());
    }
}
