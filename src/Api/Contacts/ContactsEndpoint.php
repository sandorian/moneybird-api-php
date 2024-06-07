<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Api\Contacts;

use Saloon\PaginationPlugin\Paginator;
use Sandorian\Moneybird\Api\Support\BaseEndpoint;

class ContactsEndpoint extends BaseEndpoint
{
    public function paginate(): Paginator
    {
        $request = new GetContactsPageRequest;

        return $this->client->paginate($request);
    }

    /**
     * @throws \Saloon\Exceptions\Request\FatalRequestException
     * @throws \Saloon\Exceptions\Request\RequestException
     */
    public function create(array $data): Contact
    {
        return parent::create($data);
    }

    protected function getCreateRequest(): CreateContactRequest
    {
        return new CreateContactRequest;
    }
}
