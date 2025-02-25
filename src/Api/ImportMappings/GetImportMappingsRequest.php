<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Api\ImportMappings;

use Saloon\Http\Response;
use Sandorian\Moneybird\Api\Support\BaseJsonGetRequest;

class GetImportMappingsRequest extends BaseJsonGetRequest
{
    public function resolveEndpoint(): string
    {
        return 'import_mappings';
    }

    /**
     * @return array<ImportMapping>
     */
    public function createDtoFromResponse(Response $response): array
    {
        return array_map(
            fn (array $data) => ImportMapping::createFromResponseData($data),
            $response->json()
        );
    }
}
