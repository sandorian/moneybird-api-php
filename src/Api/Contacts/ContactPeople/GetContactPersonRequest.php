<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Api\Contacts\ContactPeople;

use Saloon\Http\Response;
use Sandorian\Moneybird\Api\Support\BaseJsonGetRequest;

class GetContactPersonRequest extends BaseJsonGetRequest
{
    public function __construct(
        protected readonly string $contactId,
        protected readonly string $contactPersonId,
    ) {
        //
    }

    public function resolveEndpoint(): string
    {
        return 'contacts/'.$this->contactId.'/contact_people/'.$this->contactPersonId;
    }

    public function createDtoFromResponse(Response $response): ContactPerson
    {
        return ContactPerson::createFromResponseData($response->json());
    }
}
