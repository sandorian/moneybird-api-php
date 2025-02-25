<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Api;

use Saloon\Http\Auth\TokenAuthenticator;
use Saloon\Http\Connector;
use Saloon\Http\Request;
use Saloon\PaginationPlugin\Contracts\HasPagination;
use Saloon\PaginationPlugin\Paginator;
use Sandorian\Moneybird\Api\Administrations\AdministrationsEndpoint;
use Sandorian\Moneybird\Api\Contacts\ContactsEndpoint;
use Sandorian\Moneybird\Api\CustomFields\CustomFieldsEndpoint;
use Sandorian\Moneybird\Api\DocumentStyles\DocumentStylesEndpoint;
use Sandorian\Moneybird\Api\ExternalSalesInvoices\ExternalSalesInvoicesEndpoint;
use Sandorian\Moneybird\Api\SalesInvoices\SalesInvoicesEndpoint;
use Sandorian\Moneybird\Api\Support\MoneybirdPaginator;
use Sandorian\Moneybird\Api\TaxRates\TaxRatesEndpoint;
use Sandorian\Moneybird\Api\Webhooks\WebhooksEndpoint;

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

    /**
     * @return AdministrationsEndpoint
     */
    public function administrations(): AdministrationsEndpoint
    {
        return new AdministrationsEndpoint($this);
    }

    /**
     * @return ContactsEndpoint
     */
    public function contacts(): ContactsEndpoint
    {
        return new ContactsEndpoint($this);
    }

    /**
     * @return CustomFieldsEndpoint
     */
    public function customFields(): CustomFieldsEndpoint
    {
        return new CustomFieldsEndpoint($this);
    }

    /**
     * @return DocumentStylesEndpoint
     */
    public function documentStyles(): DocumentStylesEndpoint
    {
        return new DocumentStylesEndpoint($this);
    }

    /**
     * @return ExternalSalesInvoicesEndpoint
     */
    public function externalSalesInvoices(): ExternalSalesInvoicesEndpoint
    {
        return new ExternalSalesInvoicesEndpoint($this);
    }

    /**
     * @return SalesInvoicesEndpoint
     */
    public function salesInvoices(): SalesInvoicesEndpoint
    {
        return new SalesInvoicesEndpoint($this);
    }

    /**
     * @return TaxRatesEndpoint
     */
    public function taxRates(): TaxRatesEndpoint
    {
        return new TaxRatesEndpoint($this);
    }

    /**
     * @return WebhooksEndpoint
     */
    public function webhooks(): WebhooksEndpoint
    {
        return new WebhooksEndpoint($this);
    }
}
