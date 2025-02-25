<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Tests\Api\FinancialAccounts;

use Saloon\Http\Faking\MockResponse;
use Sandorian\Moneybird\Api\FinancialAccounts\FinancialAccount;
use Sandorian\Moneybird\Api\FinancialAccounts\GetFinancialAccountRequest;
use Sandorian\Moneybird\Api\FinancialAccounts\GetFinancialAccountsRequest;
use Sandorian\Moneybird\Api\MoneybirdApiClient;
use Sandorian\Moneybird\Tests\Api\BaseTestCase;

class FinancialAccountsEndpointTest extends BaseTestCase
{
    private MoneybirdApiClient $client;

    protected function setUp(): void
    {
        parent::setUp();

        $this->client = $this->getMoneybirdClientWithMocks([
            GetFinancialAccountsRequest::class => MockResponse::make(FinancialAccountsResponseStub::getAll(), 200),
            GetFinancialAccountRequest::class => MockResponse::make(FinancialAccountsResponseStub::get(), 200),
        ]);
    }

    public function test_it_can_get_all_financial_accounts(): void
    {
        $financialAccounts = $this->client->financialAccounts()->all();

        $this->assertCount(2, $financialAccounts);
        $this->assertContainsOnlyInstancesOf(FinancialAccount::class, $financialAccounts);
        $this->assertSame('123456789', $financialAccounts[0]->id);
        $this->assertSame('987654321', $financialAccounts[1]->id);
    }

    public function test_it_can_get_a_financial_account(): void
    {
        $financialAccount = $this->client->financialAccounts()->get('123456789');

        $this->assertInstanceOf(FinancialAccount::class, $financialAccount);
        $this->assertSame('123456789', $financialAccount->id);
        $this->assertSame('Bank Account', $financialAccount->name);
    }
}
