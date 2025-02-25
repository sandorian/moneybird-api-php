<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Api\Administrations;

use Sandorian\Moneybird\Api\Support\BaseEndpoint;

class AdministrationsEndpoint extends BaseEndpoint
{
    public function all(): array
    {
        $request = new GetAdministrationsRequest;

        return array_map(
            fn (array $data) => Administration::createFromResponseData($data),
            $this->client->send($request)->json()
        );
    }

    public function get(string $id): Administration
    {
        $request = new GetAdministrationRequest($id);

        return $this->client->send($request)->dtoOrFail();
    }
}
