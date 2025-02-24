<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Api\SalesInvoices;

use Saloon\PaginationPlugin\Paginator;
use Sandorian\Moneybird\Api\Support\BaseEndpoint;

class SalesInvoicesEndpoint extends BaseEndpoint
{
    public function create(array $data): SalesInvoice
    {
        $request = new CreateSalesInvoiceRequest;
        $request->body()->merge($data);
        $response = $this->client->send($request);

        return $request->createDtoFromResponse($response);
    }

    public function paginate(): Paginator
    {
        $request = new GetSalesInvoicesPageRequest();

        return $this->client->paginate($request);
    }
}
