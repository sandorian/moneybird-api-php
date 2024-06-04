<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Api\Contacts;

use Saloon\Http\Response;
use Saloon\PaginationPlugin\Paginator;
use Sandorian\Moneybird\Api\Support\BaseEndpoint;

class ContactsEndpoint extends BaseEndpoint
{
    public function paginate(): Paginator
    {
        $request = new GetContactsPageRequest;

        return $this->client->paginate($request);
    }

    public function create(array $data): Response
    {
        $request = new CreateContactRequest();
        $request->body()->merge($data);

        return $this->client->send($request);
    }
}
