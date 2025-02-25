<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Api\Contacts;

use Saloon\Http\Response;
use Sandorian\Moneybird\Api\Support\BaseJsonGetRequest;

class GetContactByCustomerIdRequest extends BaseJsonGetRequest
{
    public function __construct(
        private readonly string $customerId
    ) {}

    public function resolveEndpoint(): string
    {
        return 'contacts/customer_id/'.$this->customerId;
    }

    public function createDtoFromResponse(Response $response): Contact
    {
        return Contact::createFromResponseData($response->json());
    }
}
