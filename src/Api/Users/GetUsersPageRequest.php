<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Api\Users;

use Saloon\Http\Response;
use Sandorian\Moneybird\Api\Support\BaseJsonGetRequest;

class GetUsersPageRequest extends BaseJsonGetRequest
{
    public function resolveEndpoint(): string
    {
        return 'users';
    }

    /**
     * @return array<User>
     */
    public function createDtoFromResponse(Response $response): array
    {
        return array_map(
            fn (array $data) => User::createFromResponseData($data),
            $response->json()
        );
    }
}
