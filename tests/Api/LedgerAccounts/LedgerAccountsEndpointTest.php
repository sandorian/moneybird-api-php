<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Tests\Api\LedgerAccounts;

use Saloon\Http\Faking\MockResponse;
use Sandorian\Moneybird\Api\LedgerAccounts\CreateLedgerAccountRequest;
use Sandorian\Moneybird\Api\LedgerAccounts\DeleteLedgerAccountRequest;
use Sandorian\Moneybird\Api\LedgerAccounts\GetLedgerAccountRequest;
use Sandorian\Moneybird\Api\LedgerAccounts\GetLedgerAccountsRequest;
use Sandorian\Moneybird\Api\LedgerAccounts\LedgerAccount;
use Sandorian\Moneybird\Api\LedgerAccounts\UpdateLedgerAccountRequest;
use Sandorian\Moneybird\Api\MoneybirdApiClient;
use Sandorian\Moneybird\Tests\Api\BaseTestCase;

class LedgerAccountsEndpointTest extends BaseTestCase
{
    private MoneybirdApiClient $client;

    protected function setUp(): void
    {
        parent::setUp();

        $this->client = $this->getMoneybirdClientWithMocks([
            GetLedgerAccountsRequest::class => MockResponse::make(LedgerAccountsResponseStub::getAll(), 200),
            GetLedgerAccountRequest::class => MockResponse::make(LedgerAccountsResponseStub::get(), 200),
            CreateLedgerAccountRequest::class => MockResponse::make(LedgerAccountsResponseStub::create(), 201),
            UpdateLedgerAccountRequest::class => MockResponse::make(LedgerAccountsResponseStub::update(), 200),
            DeleteLedgerAccountRequest::class => MockResponse::make('', 204),
        ]);
    }

    public function test_it_can_get_all_ledger_accounts(): void
    {
        $ledgerAccounts = $this->client->ledgerAccounts()->all();

        $this->assertCount(2, $ledgerAccounts);
        $this->assertContainsOnlyInstancesOf(LedgerAccount::class, $ledgerAccounts);
        $this->assertSame('123456789', $ledgerAccounts[0]->id);
        $this->assertSame('987654321', $ledgerAccounts[1]->id);
    }

    public function test_it_can_get_a_ledger_account(): void
    {
        $ledgerAccount = $this->client->ledgerAccounts()->get('123456789');

        $this->assertInstanceOf(LedgerAccount::class, $ledgerAccount);
        $this->assertSame('123456789', $ledgerAccount->id);
        $this->assertSame('Ledger Account 1', $ledgerAccount->name);
    }

    public function test_it_can_create_a_ledger_account(): void
    {
        $ledgerAccount = $this->client->ledgerAccounts()->create([
            'name' => 'New Ledger Account',
            'account_type' => 'revenue',
            'account_id' => '3000',
            'description' => 'New revenue account',
        ]);

        $this->assertInstanceOf(LedgerAccount::class, $ledgerAccount);
        $this->assertSame('123456789', $ledgerAccount->id);
        $this->assertSame('New Ledger Account', $ledgerAccount->name);
    }

    public function test_it_can_update_a_ledger_account(): void
    {
        $ledgerAccount = $this->client->ledgerAccounts()->update('123456789', [
            'name' => 'Updated Ledger Account',
            'description' => 'Updated revenue account',
        ]);

        $this->assertInstanceOf(LedgerAccount::class, $ledgerAccount);
        $this->assertSame('123456789', $ledgerAccount->id);
        $this->assertSame('Updated Ledger Account', $ledgerAccount->name);
    }

    public function test_it_can_delete_a_ledger_account(): void
    {
        $result = $this->client->ledgerAccounts()->delete('123456789');

        $this->assertTrue($result);
    }
}
