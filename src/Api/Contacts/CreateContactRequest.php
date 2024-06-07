<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Api\Contacts;

use Saloon\Http\Response;
use Sandorian\Moneybird\Api\Support\BaseJsonPostRequest;

class CreateContactRequest extends BaseJsonPostRequest
{
    public function resolveEndpoint(): string
    {
        return 'contacts';
    }

    public function createDtoFromResponse(Response $response): mixed
    {
        return Contact::createFromResponseData($response->json());
    }
}
