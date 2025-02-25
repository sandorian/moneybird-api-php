<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Api\CustomFields;

use Saloon\Http\Response;
use Sandorian\Moneybird\Api\Support\BaseJsonGetRequest;

class GetCustomFieldRequest extends BaseJsonGetRequest
{
    public function __construct(
        protected readonly string $customFieldId,
    ) {
        //
    }

    public function resolveEndpoint(): string
    {
        return 'custom_fields/'.$this->customFieldId;
    }

    public function createDtoFromResponse(Response $response): CustomField
    {
        return CustomField::createFromResponseData($response->json());
    }
}
