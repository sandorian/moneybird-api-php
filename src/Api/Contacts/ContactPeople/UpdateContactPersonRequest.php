<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Api\Contacts\ContactPeople;

use Saloon\Http\Response;
use Sandorian\Moneybird\Api\Support\BaseJsonPatchRequest;

class UpdateContactPersonRequest extends BaseJsonPatchRequest
{
    public function __construct(
        protected readonly string $contactId,
        protected readonly string $contactPersonId,
        private readonly array $data = []
    ) {
        if (! empty($this->data)) {
            $this->setEncapsulatedData($this->data);
        }
    }

    public function resolveEndpoint(): string
    {
        return 'contacts/'.$this->contactId.'/contact_people/'.$this->contactPersonId;
    }

    public function createDtoFromResponse(Response $response): ContactPerson
    {
        return ContactPerson::createFromResponseData($response->json());
    }

    /**
     * Get the resource key for encapsulation
     *
     * The Moneybird API requires data to be encapsulated within a 'contact_person' key
     */
    protected function getResourceKey(): string
    {
        return 'contact_person';
    }
}
