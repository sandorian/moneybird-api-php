<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Tests\Api\Contacts;

use Saloon\Http\Faking\MockResponse;
use Sandorian\Moneybird\Api\Contacts\Contact;
use Sandorian\Moneybird\Api\Contacts\CreateContactRequest;
use Sandorian\Moneybird\Api\Contacts\GetContactRequest;
use Sandorian\Moneybird\Api\Support\MoneybirdPaginator;
use Sandorian\Moneybird\Tests\Api\BaseTestCase;

class ContactsEndpointTest extends BaseTestCase
{
    /** @test */
    public function testGetContact(): void
    {
        $moneybird = $this->getMoneybirdClientWithMocks([
            GetContactRequest::class => MockResponse::make(ContactResponseStub::get()),
        ]);

        $contact = $moneybird->contacts()->get('419889276175517682');

        $this->assertInstanceOf(Contact::class, $contact);
        $this->assertEquals('419889276175517682', $contact->id);
    }

    public function testCreateContact(): void
    {
        $moneybird = $this->getMoneybirdClientWithMocks([
            CreateContactRequest::class => MockResponse::make(ContactResponseStub::get(), 201),
        ]);

        $payload = [
            'company_name' => 'Sandorian Consultancy B.V.',
            'contact_country' => 'NL',
        ];

        $contact = $moneybird->contacts()->create($payload);

        $mockClient = $moneybird->getMockClient();

        $this->assertSentOnce($mockClient, $payload);
        $this->assertInstanceOf(Contact::class, $contact);
        $this->assertEquals('419889276175517682', $contact->id);
        $this->assertEquals('Sandorian Consultancy B.V.', $contact->company_name);
    }

    /** @test */
    public function testPaginateContacts(): void
    {
        $moneybird = $this->getMoneybirdClient();

        $paginator = $moneybird->contacts()->paginate();

        $this->assertInstanceOf(MoneybirdPaginator::class, $paginator);
        $this->assertEquals(0, $paginator->getCurrentPage());
    }
}
