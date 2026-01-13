<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Api\Administrations;

use Saloon\Http\Response;
use Sandorian\Moneybird\Api\Support\BaseJsonGetRequest;

class GetAdministrationRequest extends BaseJsonGetRequest
{
    public function __construct(
        protected readonly string $id,
    ) {
        //
    }

    /**
     * Returns the full URL to bypass the connector's base URL.
     * The Administrations endpoint does not use an administration ID in the path.
     */
    public function resolveEndpoint(): string
    {
        return 'https://moneybird.com/api/v2/administrations/'.$this->id;
    }

    public function createDtoFromResponse(Response $response): Administration
    {
        return Administration::createFromResponseData($response->json());
    }
}
