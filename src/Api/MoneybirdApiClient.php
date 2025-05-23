<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Api;

use Saloon\Http\Auth\TokenAuthenticator;
use Saloon\Http\Connector;
use Saloon\Http\Request;
use Saloon\PaginationPlugin\Contracts\HasPagination;
use Saloon\PaginationPlugin\Paginator;
use Saloon\RateLimitPlugin\Contracts\RateLimitStore;
use Saloon\RateLimitPlugin\Limit;
use Saloon\RateLimitPlugin\Stores\MemoryStore;
use Saloon\RateLimitPlugin\Traits\HasRateLimits;
use Sandorian\Moneybird\Api\Administrations\AdministrationsEndpoint;
use Sandorian\Moneybird\Api\Contacts\ContactsEndpoint;
use Sandorian\Moneybird\Api\CustomFields\CustomFieldsEndpoint;
use Sandorian\Moneybird\Api\Documents\GeneralDocuments\GeneralDocumentsEndpoint;
use Sandorian\Moneybird\Api\Documents\GeneralJournalDocuments\GeneralJournalDocumentsEndpoint;
use Sandorian\Moneybird\Api\Documents\PurchaseInvoices\PurchaseInvoicesEndpoint;
use Sandorian\Moneybird\Api\Documents\Receipts\ReceiptsEndpoint;
use Sandorian\Moneybird\Api\Documents\TypelessDocuments\TypelessDocumentsEndpoint;
use Sandorian\Moneybird\Api\DocumentStyles\DocumentStylesEndpoint;
use Sandorian\Moneybird\Api\Estimates\EstimatesEndpoint;
use Sandorian\Moneybird\Api\ExternalSalesInvoices\ExternalSalesInvoicesEndpoint;
use Sandorian\Moneybird\Api\FinancialAccounts\FinancialAccountsEndpoint;
use Sandorian\Moneybird\Api\FinancialMutations\FinancialMutationsEndpoint;
use Sandorian\Moneybird\Api\FinancialStatements\FinancialStatementsEndpoint;
use Sandorian\Moneybird\Api\Identities\IdentitiesEndpoint;
use Sandorian\Moneybird\Api\ImportMappings\ImportMappingsEndpoint;
use Sandorian\Moneybird\Api\LedgerAccounts\LedgerAccountsEndpoint;
use Sandorian\Moneybird\Api\Payments\PaymentsEndpoint;
use Sandorian\Moneybird\Api\Products\ProductsEndpoint;
use Sandorian\Moneybird\Api\Projects\ProjectsEndpoint;
use Sandorian\Moneybird\Api\PurchaseTransactions\PurchaseTransactionsEndpoint;
use Sandorian\Moneybird\Api\RecurringSalesInvoices\RecurringSalesInvoicesEndpoint;
use Sandorian\Moneybird\Api\SalesInvoices\SalesInvoicesEndpoint;
use Sandorian\Moneybird\Api\Subscriptions\SubscriptionsEndpoint;
use Sandorian\Moneybird\Api\SubscriptionTemplates\SubscriptionTemplatesEndpoint;
use Sandorian\Moneybird\Api\Support\MoneybirdPaginator;
use Sandorian\Moneybird\Api\TaxRates\TaxRatesEndpoint;
use Sandorian\Moneybird\Api\TimeEntries\TimeEntriesEndpoint;
use Sandorian\Moneybird\Api\Users\UsersEndpoint;
use Sandorian\Moneybird\Api\Verifications\VerificationsEndpoint;
use Sandorian\Moneybird\Api\Webhooks\WebhooksEndpoint;

class MoneybirdApiClient extends Connector implements HasPagination
{
    use HasRateLimits;

    public function __construct(
        protected readonly string $key,
        protected readonly string $administrationId,
    ) {
        $this->rateLimitStore = new MemoryStore;
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

    /**
     * {@inheritDoc}
     */
    protected function resolveLimits(): array
    {
        return [
            Limit::allow(150)->everyFiveMinutes(),
        ];
    }

    /**
     * {@inheritDoc}
     */
    protected function resolveRateLimitStore(): RateLimitStore
    {
        return new MemoryStore;
    }

    /**
     * Set the rate limit store. By default, it's an in-memory store that gets destroyed when this
     * MoneybirdApiClient instance is destroyed.
     *
     * @return $this
     */
    public function setRateLimitStore(RateLimitStore $rateLimitStore): self
    {
        $this->rateLimitStore = $rateLimitStore;

        return $this;
    }

    /**
     * Disable rate limiting. By default, it's enabled.
     *
     * @return $this
     */
    public function disableRateLimiting(): self
    {
        $this->rateLimitingEnabled = false;

        return $this;
    }

    /**
     * Enable rate limiting. By default, it's already enabled.
     *
     * @return $this
     */
    public function enableRateLimiting(): self
    {
        $this->rateLimitingEnabled = true;

        return $this;
    }

    public function paginate(Request $request): Paginator
    {
        return new MoneybirdPaginator($this, $request);
    }

    // ========== Endpoints ==========

    public function administrations(): AdministrationsEndpoint
    {
        return new AdministrationsEndpoint($this);
    }

    public function contacts(): ContactsEndpoint
    {
        return new ContactsEndpoint($this);
    }

    public function customFields(): CustomFieldsEndpoint
    {
        return new CustomFieldsEndpoint($this);
    }

    public function documentStyles(): DocumentStylesEndpoint
    {
        return new DocumentStylesEndpoint($this);
    }

    public function generalDocuments(): GeneralDocumentsEndpoint
    {
        return new GeneralDocumentsEndpoint($this);
    }

    public function generalJournalDocuments(): GeneralJournalDocumentsEndpoint
    {
        return new GeneralJournalDocumentsEndpoint($this);
    }

    public function purchaseInvoices(): PurchaseInvoicesEndpoint
    {
        return new PurchaseInvoicesEndpoint($this);
    }

    public function receipts(): ReceiptsEndpoint
    {
        return new ReceiptsEndpoint($this);
    }

    public function typelessDocuments(): TypelessDocumentsEndpoint
    {
        return new TypelessDocumentsEndpoint($this);
    }

    public function estimates(): EstimatesEndpoint
    {
        return new EstimatesEndpoint($this);
    }

    public function financialAccounts(): FinancialAccountsEndpoint
    {
        return new FinancialAccountsEndpoint($this);
    }

    public function financialMutations(): FinancialMutationsEndpoint
    {
        return new FinancialMutationsEndpoint($this);
    }

    public function financialStatements(): FinancialStatementsEndpoint
    {
        return new FinancialStatementsEndpoint($this);
    }

    public function externalSalesInvoices(): ExternalSalesInvoicesEndpoint
    {
        return new ExternalSalesInvoicesEndpoint($this);
    }

    public function salesInvoices(): SalesInvoicesEndpoint
    {
        return new SalesInvoicesEndpoint($this);
    }

    public function taxRates(): TaxRatesEndpoint
    {
        return new TaxRatesEndpoint($this);
    }

    public function webhooks(): WebhooksEndpoint
    {
        return new WebhooksEndpoint($this);
    }

    public function identities(): IdentitiesEndpoint
    {
        return new IdentitiesEndpoint($this);
    }

    public function importMappings(): ImportMappingsEndpoint
    {
        return new ImportMappingsEndpoint($this);
    }

    public function ledgerAccounts(): LedgerAccountsEndpoint
    {
        return new LedgerAccountsEndpoint($this);
    }

    public function payments(): PaymentsEndpoint
    {
        return new PaymentsEndpoint($this);
    }

    public function products(): ProductsEndpoint
    {
        return new ProductsEndpoint($this);
    }

    public function projects(): ProjectsEndpoint
    {
        return new ProjectsEndpoint($this);
    }

    public function purchaseTransactions(): PurchaseTransactionsEndpoint
    {
        return new PurchaseTransactionsEndpoint($this);
    }

    public function recurringSalesInvoices(): RecurringSalesInvoicesEndpoint
    {
        return new RecurringSalesInvoicesEndpoint($this);
    }

    public function subscriptionTemplates(): SubscriptionTemplatesEndpoint
    {
        return new SubscriptionTemplatesEndpoint($this);
    }

    public function subscriptions(): SubscriptionsEndpoint
    {
        return new SubscriptionsEndpoint($this);
    }

    public function timeEntries(): TimeEntriesEndpoint
    {
        return new TimeEntriesEndpoint($this);
    }

    public function users(): UsersEndpoint
    {
        return new UsersEndpoint($this);
    }

    public function verifications(): VerificationsEndpoint
    {
        return new VerificationsEndpoint($this);
    }
}
