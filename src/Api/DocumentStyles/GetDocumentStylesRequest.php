<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Api\DocumentStyles;

use Saloon\Http\Response;
use Sandorian\Moneybird\Api\Support\BaseJsonGetRequest;

class GetDocumentStylesRequest extends BaseJsonGetRequest
{
    public function resolveEndpoint(): string
    {
        return 'document_styles';
    }

    /**
     * @return array<DocumentStyle>
     */
    public function createDtoFromResponse(Response $response): array
    {
        return array_map(
            fn (array $data) => DocumentStyle::createFromResponseData($data),
            $response->json()
        );
    }
}
