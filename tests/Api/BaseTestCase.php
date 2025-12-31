<?php

namespace Sandorian\Moneybird\Tests\Api;

use PHPUnit\Framework\TestCase;
use Saloon\Config;
use Saloon\Enums\Method;
use Saloon\Http\Faking\MockClient;
use Saloon\Http\Request;
use Sandorian\Moneybird\Api\MoneybirdApiClient;

abstract class BaseTestCase extends TestCase
{
    protected const MONEYBIRD_KEY = 'testKey123';

    protected const MONEYBIRD_ADMINISTRATION_ID = 'testAdministration123';

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
        return (new MoneybirdApiClient(
            key: self::MONEYBIRD_KEY,
            administrationId: self::MONEYBIRD_ADMINISTRATION_ID
        ))->disableRateLimiting();
    }

    protected function assertSentOnce(MockClient $mockClient, array $payload): void
    {
        $mockClient->assertSentCount(1);
        $mockClient->assertSent(function (Request $request) use ($payload) {
            return $request->getMethod() === Method::POST && $request->body()->all() === $payload;
        });
    }
}
