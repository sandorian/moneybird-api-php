<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Api\Contacts;

use Saloon\Http\Response;
use Sandorian\Moneybird\Api\Support\BaseJsonPatchRequest;

class UpdateContactRequest extends BaseJsonPatchRequest
{
    public function __construct(
        private readonly string $contactId
    ) {}

    public function resolveEndpoint(): string
    {
        return 'contacts/'.$this->contactId;
    }

    public function createDtoFromResponse(Response $response): Contact
    {
        return Contact::createFromResponseData($response->json());
    }
}
