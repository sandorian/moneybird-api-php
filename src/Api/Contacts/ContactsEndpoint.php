<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Api\Contacts;

use Saloon\PaginationPlugin\Paginator;
use Sandorian\Moneybird\Api\Support\BaseEndpoint;

class ContactsEndpoint extends BaseEndpoint
{
    protected string $createRequestClass = CreateContactRequest::class;

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
        $request = new CreateContactRequest;
        $request->body()->merge($data);

        return $this->client->send($request)->dtoOrFail();
    }
}
