<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Api\ImportMappings;

use Saloon\Http\Response;
use Sandorian\Moneybird\Api\Support\BaseJsonDeleteRequest;

class DeleteImportMappingRequest extends BaseJsonDeleteRequest
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

    public function createDtoFromResponse(Response $response): bool
    {
        return $response->status() === 204;
    }
}
