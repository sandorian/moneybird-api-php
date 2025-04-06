<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Api\Contacts\Notes;

use Saloon\Http\Response;
use Sandorian\Moneybird\Api\Support\BaseJsonPostRequest;
use Sandorian\Moneybird\Api\Support\EncapsulatesData;

class CreateNoteRequest extends BaseJsonPostRequest
{
    use EncapsulatesData;

    /**
     * @param  string  $contactId  The ID of the contact to create a note for
     */
    public function __construct(
        protected readonly string $contactId,
    ) {
        //
    }

    public function resolveEndpoint(): string
    {
        return 'contacts/'.$this->contactId.'/notes';
    }

    public function createDtoFromResponse(Response $response): Note
    {
        return Note::createFromResponseData($response->json());
    }

    /**
     * Get the resource key for encapsulation
     *
     * The Moneybird API requires data to be encapsulated within a 'note' key
     */
    protected function getResourceKey(): string
    {
        return 'note';
    }

    /**
     * Get the default body for the request
     *
     * @return array<string, mixed>
     */
    protected function defaultBody(): array
    {
        return [];
    }
}
