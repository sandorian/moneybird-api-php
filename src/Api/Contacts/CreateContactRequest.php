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

    public function createDtoFromResponse(Response $response): Contact
    {
        return Contact::createFromResponseData($response->json());
    }
    
    /**
     * Get the resource key for encapsulation
     * 
     * The Moneybird API requires data to be encapsulated within a 'contact' key
     */
    protected function getResourceKey(): string
    {
        return 'contact';
    }
}
