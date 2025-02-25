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

    public function getByCustomerId(string $customerId): Contact
    {
        $request = new GetContactByCustomerIdRequest($customerId);

        return $this->client->send($request)->dtoOrFail();
    }

    public function filter(array $filters = []): MoneybirdPaginator
    {
        $request = new FilterContactsRequest($filters);

        return new MoneybirdPaginator($this->client, $request);
    }

    public function getSynchronization(): array
    {
        $request = new GetContactsSynchronizationRequest;

        return $this->client->send($request)->json();
    }

    public function synchronize(array $ids): array
    {
        $request = new SynchronizeContactsRequest;
        $request->body()->merge(['ids' => $ids]);

        return $this->client->send($request)->json();
    }

    public function update(string $contactId, array $data): Contact
    {
        $request = new UpdateContactRequest($contactId);
        $request->body()->merge($data);

        return $this->client->send($request)->dtoOrFail();
    }

    public function delete(string $contactId): void
    {
        $request = new DeleteContactRequest($contactId);

        $this->client->send($request);
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
