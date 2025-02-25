<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Api\Contacts;

use Saloon\Http\Response;
use Sandorian\Moneybird\Api\Support\BaseJsonPostRequest;

class SynchronizeContactsRequest extends BaseJsonPostRequest
{
    public function resolveEndpoint(): string
    {
        return 'contacts/synchronization';
    }

    public function createDtoFromResponse(Response $response): Contact
    {
        return Contact::createFromResponseData($response->json());
    }
}
