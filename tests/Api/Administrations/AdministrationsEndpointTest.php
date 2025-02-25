<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Tests\Api\Administrations;

use Saloon\Http\Faking\MockResponse;
use Sandorian\Moneybird\Api\Administrations\Administration;
use Sandorian\Moneybird\Api\Administrations\GetAdministrationRequest;
use Sandorian\Moneybird\Api\Administrations\GetAdministrationsRequest;
use Sandorian\Moneybird\Tests\Api\BaseTestCase;

class AdministrationsEndpointTest extends BaseTestCase
{
    public function test_get_all_administrations(): void
    {
        $moneybird = $this->getMoneybirdClientWithMocks([
            GetAdministrationsRequest::class => MockResponse::make(AdministrationResponseStub::getAll()),
        ]);

        $administrations = $moneybird->administrations()->all();

        $this->assertIsArray($administrations);
        $this->assertCount(2, $administrations);
        $this->assertInstanceOf(Administration::class, $administrations[0]);
        $this->assertEquals('123456789', $administrations[0]->id);
        $this->assertEquals('Test Administration', $administrations[0]->name);
        $this->assertEquals('987654321', $administrations[1]->id);
        $this->assertEquals('Another Administration', $administrations[1]->name);
    }

    public function test_get_administration(): void
    {
        $moneybird = $this->getMoneybirdClientWithMocks([
            GetAdministrationRequest::class => MockResponse::make(AdministrationResponseStub::get()),
        ]);

        $administration = $moneybird->administrations()->get('123456789');

        $this->assertInstanceOf(Administration::class, $administration);
        $this->assertEquals('123456789', $administration->id);
        $this->assertEquals('Test Administration', $administration->name);
        $this->assertEquals('nl', $administration->language);
        $this->assertEquals('EUR', $administration->currency);
        $this->assertEquals('NL', $administration->country);
    }
}
