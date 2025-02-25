<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Api\CustomFields;

use Sandorian\Moneybird\Api\Support\BaseEndpoint;

class CustomFieldsEndpoint extends BaseEndpoint
{
    /**
     * @return array<CustomField>
     */
    public function all(): array
    {
        $request = new GetCustomFieldsRequest;

        return $this->client->send($request)->dtoOrFail();
    }

    public function get(string $customFieldId): CustomField
    {
        $request = new GetCustomFieldRequest($customFieldId);

        return $this->client->send($request)->dtoOrFail();
    }
}
