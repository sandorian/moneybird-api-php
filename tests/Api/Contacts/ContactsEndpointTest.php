<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Tests\Api\Contacts;

use Saloon\Http\Faking\MockClient;
use Saloon\Http\Faking\MockResponse;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Sandorian\Moneybird\Api\Contacts\CreateContactRequest;
use Sandorian\Moneybird\Api\MoneybirdApiClient;
use Sandorian\Moneybird\Tests\Api\BaseTestCase;

class ContactsEndpointTest extends BaseTestCase
{
    public function testCreateContact(): void
    {
        $key = 'testKey123';
        $administrationId = 'testAdministration123';
        $moneybird = new MoneybirdApiClient($key, $administrationId);

        $mockClient = new MockClient([
            CreateContactRequest::class => MockResponse::make('TO DO', 200),
        ]);

        $moneybird->withMockClient($mockClient);

        $response = $moneybird->contacts()->create([
            'company_name' => 'Sandorian Consultancy B.V.',
            'contact_country' => 'NL',
        ]);

        $mockClient->assertSentCount(1);
        $mockClient->assertSent(function (Request $request) {
            return $request->body()->all() === [
                'company_name' => 'Sandorian Consultancy B.V.',
                'contact_country' => 'NL',
            ];
        });

        $this->assertInstanceOf(Response::class, $response);
    }
}
