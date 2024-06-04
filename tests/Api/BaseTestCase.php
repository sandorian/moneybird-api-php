<?php

namespace Sandorian\Moneybird\Tests\Api;

use PHPUnit\Framework\TestCase;
use Saloon\Http\Faking\MockClient;
use Sandorian\Moneybird\Api\MoneybirdApiClient;

abstract class BaseTestCase extends TestCase
{
    const MONEYBIRD_KEY = 'testKey123';

    const MONEYBIRD_ADMINISTRATION_ID = 'testAdministration123';

    protected function setUp(): void
    {
        parent::setUp();

        MockClient::destroyGlobal();
    }

    protected function getMoneybirdClientWithMocks(array $mocks)
    {
        $moneybird = new MoneybirdApiClient(
            key: self::MONEYBIRD_KEY,
            administrationId: self::MONEYBIRD_ADMINISTRATION_ID
        );

        $moneybird->withMockClient(new MockClient($mocks));

        return $moneybird;
    }
}
