<?php

namespace Sandorian\Moneybird\Tests\Api;

use PHPUnit\Framework\TestCase;
use Saloon\Config;
use Saloon\Http\Faking\MockClient;
use Sandorian\Moneybird\Api\MoneybirdApiClient;

abstract class BaseTestCase extends TestCase
{
    const MONEYBIRD_KEY = 'testKey123';

    const MONEYBIRD_ADMINISTRATION_ID = 'testAdministration123';

    protected function setUp(): void
    {
        parent::setUp();

        Config::preventStrayRequests();
        MockClient::destroyGlobal();
    }

    protected function getMoneybirdClientWithMocks(array $mocks = []): MoneybirdApiClient
    {
        return $this
            ->getMoneybirdClient()
            ->withMockClient(
                mockClient: new MockClient(mockData: $mocks)
            );
    }

    protected function getMoneybirdClient()
    {
        return new MoneybirdApiClient(
            key: self::MONEYBIRD_KEY,
            administrationId: self::MONEYBIRD_ADMINISTRATION_ID
        );
    }
}
