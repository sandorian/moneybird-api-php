<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Tests\Api\Identities;

use Saloon\Http\Faking\MockResponse;
use Sandorian\Moneybird\Api\Identities\GetIdentitiesRequest;
use Sandorian\Moneybird\Api\Identities\GetIdentityRequest;
use Sandorian\Moneybird\Api\Identities\Identity;
use Sandorian\Moneybird\Api\MoneybirdApiClient;
use Sandorian\Moneybird\Tests\Api\BaseTestCase;

class IdentitiesEndpointTest extends BaseTestCase
{
    private MoneybirdApiClient $client;

    protected function setUp(): void
    {
        parent::setUp();

        $this->client = $this->getMoneybirdClientWithMocks([
            GetIdentitiesRequest::class => MockResponse::make(IdentitiesResponseStub::getAll(), 200),
            GetIdentityRequest::class => MockResponse::make(IdentitiesResponseStub::get(), 200),
        ]);
    }

    public function test_it_can_get_all_identities(): void
    {
        $identities = $this->client->identities()->all();

        $this->assertCount(2, $identities);
        $this->assertContainsOnlyInstancesOf(Identity::class, $identities);
        $this->assertSame('123456789', $identities[0]->id);
        $this->assertSame('987654321', $identities[1]->id);
    }

    public function test_it_can_get_an_identity(): void
    {
        $identity = $this->client->identities()->get('123456789');

        $this->assertInstanceOf(Identity::class, $identity);
        $this->assertSame('123456789', $identity->id);
        $this->assertSame('Company A', $identity->company_name);
    }
}
