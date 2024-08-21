<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Api\Contacts;

use Sandorian\Moneybird\Api\Support\BaseEndpoint;
use Sandorian\Moneybird\Api\Support\MoneybirdPaginator;

/**
 * @method Contact create(array $data)
 * @method MoneybirdPaginator paginate()
 */
class ContactsEndpoint extends BaseEndpoint
{
    public function get(string $contactId): Contact
    {
        $request = new GetContactRequest($contactId);

        return $this->client->send($request)->dtoOrFail();
    }

    protected function getCreateRequest(): CreateContactRequest
    {
        return new CreateContactRequest;
    }

    protected function getPaginateRequest(): GetContactsPageRequest
    {
        return new GetContactsPageRequest;
    }
}
