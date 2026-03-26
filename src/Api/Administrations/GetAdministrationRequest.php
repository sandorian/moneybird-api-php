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
     * The Administrations endpoint does not use an administration ID in the path,
     * so we navigate up from the connector's base URL (which includes the admin ID).
     */
    public function resolveEndpoint(): string
    {
        return '/../administrations/'.$this->id;
    }

    public function createDtoFromResponse(Response $response): Administration
    {
        return Administration::createFromResponseData($response->json());
    }
}
