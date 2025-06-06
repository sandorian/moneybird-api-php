<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Api\Administrations;

use Saloon\Http\Response;
use Sandorian\Moneybird\Api\Support\BaseJsonGetRequest;

class GetAdministrationsRequest extends BaseJsonGetRequest
{
    public function resolveEndpoint(): string
    {
        return '/administrations';
    }

    public function resolveBaseUrl(): string
    {
        return 'https://moneybird.com/api/v2';
    }

    public function createDtoFromResponse(Response $response): Administration
    {
        return Administration::createFromResponseData($response->json());
    }
}
