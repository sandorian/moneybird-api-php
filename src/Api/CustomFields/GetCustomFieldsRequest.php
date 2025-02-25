<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Api\CustomFields;

use Saloon\Http\Response;
use Sandorian\Moneybird\Api\Support\BaseJsonGetRequest;

class GetCustomFieldsRequest extends BaseJsonGetRequest
{
    public function resolveEndpoint(): string
    {
        return 'custom_fields';
    }

    /**
     * @return array<CustomField>
     */
    public function createDtoFromResponse(Response $response): array
    {
        return array_map(
            fn (array $data) => CustomField::createFromResponseData($data),
            $response->json()
        );
    }
}
