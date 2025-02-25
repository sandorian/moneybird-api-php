<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Api\Identities;

use Saloon\PaginationPlugin\Paginator;
use Sandorian\Moneybird\Api\Support\BaseEndpoint;
use Sandorian\Moneybird\Api\Support\MoneybirdPaginator;

class IdentitiesEndpoint extends BaseEndpoint
{
    /**
     * @return Paginator<Identity>
     */
    public function paginate(): Paginator
    {
        $request = new GetIdentitiesRequest;

        return new MoneybirdPaginator($this->client, $request);
    }

    /**
     * @return array<Identity>
     */
    public function all(): array
    {
        $request = new GetIdentitiesRequest;

        return $this->client->send($request)->dtoOrFail();
    }

    public function get(string $identityId): Identity
    {
        $request = new GetIdentityRequest($identityId);

        return $this->client->send($request)->dtoOrFail();
    }
}
