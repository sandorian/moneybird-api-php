<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Api\Contacts\ContactPeople;

use Saloon\Http\Response;
use Sandorian\Moneybird\Api\Support\BaseJsonPostRequest;

class CreateContactPersonRequest extends BaseJsonPostRequest
{
    public function __construct(
        protected readonly string $contactId,
    ) {
        //
    }

    public function resolveEndpoint(): string
    {
        return 'contacts/'.$this->contactId.'/contact_people';
    }

    public function createDtoFromResponse(Response $response): ContactPerson
    {
        return ContactPerson::createFromResponseData($response->json());
    }
}
