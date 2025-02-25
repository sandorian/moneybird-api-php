<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Api\ImportMappings;

use Saloon\Http\Response;
use Sandorian\Moneybird\Api\Support\BaseJsonPostRequest;

class CreateImportMappingRequest extends BaseJsonPostRequest
{
    /**
     * @param  array<string, mixed>  $data
     */
    public function __construct(
        protected readonly array $data,
    ) {
        //
    }

    public function resolveEndpoint(): string
    {
        return 'import_mappings';
    }

    public function createDtoFromResponse(Response $response): ImportMapping
    {
        return ImportMapping::createFromResponseData($response->json());
    }

    protected function defaultBody(): array
    {
        return [
            'import_mapping' => $this->data,
        ];
    }
}
