<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Api\ImportMappings;

use Saloon\Http\Response;
use Sandorian\Moneybird\Api\Support\BaseJsonGetRequest;

class GetImportMappingRequest extends BaseJsonGetRequest
{
    public function __construct(
        protected readonly string $importMappingId,
    ) {
        //
    }

    public function resolveEndpoint(): string
    {
        return 'import_mappings/'.$this->importMappingId;
    }

    public function createDtoFromResponse(Response $response): ImportMapping
    {
        return ImportMapping::createFromResponseData($response->json());
    }
}
