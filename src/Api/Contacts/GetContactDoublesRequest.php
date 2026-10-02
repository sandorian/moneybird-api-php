<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Api\Contacts;

use Saloon\Http\Response;
use Saloon\PaginationPlugin\Contracts\Paginatable;
use Sandorian\Moneybird\Api\Support\BaseJsonGetRequest;

class GetContactDoublesRequest extends BaseJsonGetRequest implements Paginatable
{
    public function resolveEndpoint(): string
    {
        return 'contacts/doubles';
    }

    /**
     * @return array<ContactDuplicateGroup>
     */
    public function createDtoFromResponse(Response $response): array
    {
        return array_map(
            fn (array $data) => ContactDuplicateGroup::createFromResponseData($data),
            $response->json()
        );
    }
}
