<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Api\Identities;

use Saloon\Http\Response;
use Sandorian\Moneybird\Api\Support\BaseJsonGetRequest;

class GetIdentitiesRequest extends BaseJsonGetRequest
{
    public function resolveEndpoint(): string
    {
        return 'identities';
    }

    /**
     * @return array<Identity>
     */
    public function createDtoFromResponse(Response $response): array
    {
        return array_map(
            fn (array $data) => Identity::createFromResponseData($data),
            $response->json()
        );
    }
}
