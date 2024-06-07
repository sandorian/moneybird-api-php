<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Tests\Api\Contacts;

use Saloon\Http\Faking\MockClient;
use Saloon\Http\Faking\MockResponse;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\PaginationPlugin\Paginator;
use Sandorian\Moneybird\Api\Contacts\Contact;
use Sandorian\Moneybird\Api\Contacts\CreateContactRequest;
use Sandorian\Moneybird\Tests\Api\BaseTestCase;

class ContactsEndpointTest extends BaseTestCase
{
    public function testCreateContact(): void
    {
        $moneybird = $this->getMoneybirdClientWithMocks([
            CreateContactRequest::class => MockResponse::make(ContactResponseStub::get(), 201),
        ]);

        $payload = [
            'company_name' => 'Sandorian Consultancy B.V.',
            'contact_country' => 'NL',
        ];

        $response = $moneybird->contacts()->create($payload);

        $this->assertSentOnce($moneybird->getMockClient(), $response, $payload);

        $contact = $response->dtoOrFail();

        $this->assertInstanceOf(Contact::class, $contact);
        $this->assertEquals('419889276175517682', $contact->id);
        $this->assertEquals('Sandorian Consultancy B.V.', $contact->company_name);
    }

    /** @test */
    public function testPaginateContacts(): void
    {
        $moneybird = $this->getMoneybirdClient();

        $paginator = $moneybird->contacts()->paginate();

        $this->assertInstanceOf(Paginator::class, $paginator);
        $this->assertEquals(0, $paginator->getCurrentPage());
    }

    protected function assertSentOnce(
        MockClient $mockClient,
        Response $response,
        array $body = [],
    ): void {
        $mockClient->assertSentCount(1);
        $mockClient->assertSent(function (Request $request) use ($body) {
            return $request->body()->all() === $body;
        });

        $this->assertInstanceOf(Response::class, $response);
    }
}
