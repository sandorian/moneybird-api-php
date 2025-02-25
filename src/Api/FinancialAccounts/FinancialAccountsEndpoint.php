<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Api\FinancialAccounts;

use Saloon\PaginationPlugin\Paginator;
use Sandorian\Moneybird\Api\Support\BaseEndpoint;
use Sandorian\Moneybird\Api\Support\MoneybirdPaginator;

class FinancialAccountsEndpoint extends BaseEndpoint
{
    /**
     * @return Paginator<FinancialAccount>
     */
    public function paginate(): Paginator
    {
        $request = new GetFinancialAccountsRequest;

        return new MoneybirdPaginator($this->client, $request);
    }

    /**
     * @return array<FinancialAccount>
     */
    public function all(): array
    {
        $request = new GetFinancialAccountsRequest;

        return $this->client->send($request)->dtoOrFail();
    }

    public function get(string $financialAccountId): FinancialAccount
    {
        $request = new GetFinancialAccountRequest($financialAccountId);

        return $this->client->send($request)->dtoOrFail();
    }
}
