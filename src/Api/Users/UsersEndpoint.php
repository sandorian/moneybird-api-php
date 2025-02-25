<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Api\Users;

use Saloon\PaginationPlugin\Paginator;
use Sandorian\Moneybird\Api\Support\BaseEndpoint;

class UsersEndpoint extends BaseEndpoint
{
    public function get(string $id): User
    {
        $request = new GetUserRequest($id);
        $response = $this->client->send($request);

        return $request->createDtoFromResponse($response);
    }

    public function paginate(): Paginator
    {
        $request = new GetUsersPageRequest;

        return $this->client->paginate($request);
    }
}
