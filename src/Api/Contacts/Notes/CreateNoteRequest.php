<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Api\Contacts\Notes;

use Saloon\Http\Response;
use Sandorian\Moneybird\Api\Support\BaseJsonPostRequest;

class CreateNoteRequest extends BaseJsonPostRequest
{
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
}
