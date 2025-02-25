<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Api\Identities;

use Saloon\Http\Response;
use Sandorian\Moneybird\Api\Support\BaseJsonGetRequest;

class GetIdentityRequest extends BaseJsonGetRequest
{
    public function __construct(
        protected readonly string $identityId,
    ) {
        //
    }

    public function resolveEndpoint(): string
    {
        return 'identities/'.$this->identityId;
    }

    public function createDtoFromResponse(Response $response): Identity
    {
        return Identity::createFromResponseData($response->json());
    }
}
