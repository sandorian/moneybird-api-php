<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Api\ImportMappings;

use Saloon\Http\Response;
use Sandorian\Moneybird\Api\Support\BaseJsonPatchRequest;
use Sandorian\Moneybird\Api\Support\EncapsulatesData;

class UpdateImportMappingRequest extends BaseJsonPatchRequest
{
    use EncapsulatesData;

    /**
     * @param  array<string, mixed>  $data
     */
    public function __construct(
        protected readonly string $importMappingId,
        protected readonly array $data,
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

    protected function defaultBody(): array
    {
        return $this->encapsulateData($this->data);
    }

    /**
     * Get the resource key for encapsulation
     *
     * The Moneybird API requires data to be encapsulated within a 'import_mapping' key
     */
    protected function getResourceKey(): string
    {
        return 'import_mapping';
    }
}
