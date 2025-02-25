<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Api\Users;

use Saloon\Http\Response;
use Sandorian\Moneybird\Api\Support\BaseJsonGetRequest;

class GetUserRequest extends BaseJsonGetRequest
{
    public function __construct(
        protected readonly string $userId,
    ) {
        //
    }

    public function resolveEndpoint(): string
    {
        return "users/{$this->userId}";
    }

    public function createDtoFromResponse(Response $response): User
    {
        return User::createFromResponseData($response->json());
    }
}
