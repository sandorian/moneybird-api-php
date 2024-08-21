<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Tests\Api\TaxRates;

use Sandorian\Moneybird\Api\Support\MoneybirdPaginator;
use Sandorian\Moneybird\Tests\Api\BaseTestCase;

class TaxRatesEndpointTest extends BaseTestCase
{
    /** @test */
    public function testGetTaxRatesPage(): void
    {
        $moneybird = $this->getMoneybirdClient();

        $paginator = $moneybird->contacts()->paginate();

        $this->assertInstanceOf(MoneybirdPaginator::class, $paginator);
        $this->assertEquals(0, $paginator->getCurrentPage());
    }
}
