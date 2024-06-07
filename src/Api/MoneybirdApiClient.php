<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Api;

use Saloon\Http\Auth\TokenAuthenticator;
use Saloon\Http\Connector;
use Saloon\Http\Request;
use Saloon\PaginationPlugin\Contracts\HasPagination;
use Saloon\PaginationPlugin\Paginator;
use Sandorian\Moneybird\Api\Contacts\ContactsEndpoint;
use Sandorian\Moneybird\Api\ExternalSalesInvoices\ExternalSalesInvoicesEndpoint;
use Sandorian\Moneybird\Api\Support\MoneybirdPaginator;
use Sandorian\Moneybird\Api\TaxRates\TaxRatesEndpoint;

class MoneybirdApiClient extends Connector implements HasPagination
{
    public function __construct(
        protected readonly string $key,
        protected readonly string $administrationId,
    ) {
        //
    }

    public function resolveBaseUrl(): string
    {
        return 'https://moneybird.com/api/v2/'.$this->administrationId;
    }

    protected function defaultAuth(): TokenAuthenticator
    {
        return new TokenAuthenticator($this->key);
    }

    protected function defaultHeaders(): array
    {
        return [
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
        ];
    }

    public function paginate(Request $request): Paginator
    {
        return new MoneybirdPaginator($this, $request);
    }

    // ========== Endpoints ==========

    public function contacts(): ContactsEndpoint
    {
        return new ContactsEndpoint($this);
    }

    public function externalSalesInvoices(): ExternalSalesInvoicesEndpoint
    {
        return new ExternalSalesInvoicesEndpoint($this);
    }

    public function taxRates(): TaxRatesEndpoint
    {
        return new TaxRatesEndpoint($this);
    }
}
