<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Tests\Api\Contacts;

use Saloon\Http\Faking\MockResponse;
use Sandorian\Moneybird\Api\Contacts\Contact;
use Sandorian\Moneybird\Api\Contacts\CreateContactRequest;
use Sandorian\Moneybird\Api\Contacts\DeleteContactRequest;
use Sandorian\Moneybird\Api\Contacts\GetContactByCustomerIdRequest;
use Sandorian\Moneybird\Api\Contacts\GetContactRequest;
use Sandorian\Moneybird\Api\Contacts\GetContactsSynchronizationRequest;
use Sandorian\Moneybird\Api\Contacts\SynchronizeContactsRequest;
use Sandorian\Moneybird\Api\Contacts\UpdateContactRequest;
use Sandorian\Moneybird\Api\Support\MoneybirdPaginator;
use Sandorian\Moneybird\Tests\Api\BaseTestCase;

class ContactsEndpointTest extends BaseTestCase
{
    public function test_get_contact(): void
    {
        $moneybird = $this->getMoneybirdClientWithMocks([
            GetContactRequest::class => MockResponse::make(ContactResponseStub::get()),
        ]);

        $contact = $moneybird->contacts()->get('419889276175517682');

        $this->assertInstanceOf(Contact::class, $contact);
        $this->assertEquals('419889276175517682', $contact->id);
    }

    public function test_get_contact_by_customer_id(): void
    {
        $moneybird = $this->getMoneybirdClientWithMocks([
            GetContactByCustomerIdRequest::class => MockResponse::make(ContactResponseStub::get()),
        ]);

        $contact = $moneybird->contacts()->getByCustomerId('1');

        $this->assertInstanceOf(Contact::class, $contact);
        $this->assertEquals('419889276175517682', $contact->id);
        $this->assertEquals('1', $contact->customer_id);
    }

    public function test_filter_contacts(): void
    {
        $moneybird = $this->getMoneybirdClient();

        $paginator = $moneybird->contacts()->filter(['query' => 'Sandorian']);

        $this->assertInstanceOf(MoneybirdPaginator::class, $paginator);
        $this->assertEquals(0, $paginator->getCurrentPage());
    }

    public function test_get_contacts_synchronization(): void
    {
        $syncResponse = [
            ['id' => '419889276175517682', 'version' => 1],
            ['id' => '419889276175517683', 'version' => 2],
        ];

        $moneybird = $this->getMoneybirdClientWithMocks([
            GetContactsSynchronizationRequest::class => MockResponse::make($syncResponse),
        ]);

        $result = $moneybird->contacts()->getSynchronization();

        $this->assertIsArray($result);
        $this->assertCount(2, $result);
        $this->assertEquals('419889276175517682', $result[0]['id']);
        $this->assertEquals(1, $result[0]['version']);
    }

    public function test_synchronize_contacts(): void
    {
        $moneybird = $this->getMoneybirdClientWithMocks([
            SynchronizeContactsRequest::class => MockResponse::make([ContactResponseStub::get()]),
        ]);

        $ids = ['419889276175517682'];
        $result = $moneybird->contacts()->synchronize($ids);

        $mockClient = $moneybird->getMockClient();
        $this->assertSentOnce($mockClient, ['ids' => $ids]);
        $this->assertIsArray($result);
        $this->assertCount(1, $result);
    }

    public function test_create_contact(): void
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

    public function test_update_contact(): void
    {
        $moneybird = $this->getMoneybirdClientWithMocks([
            UpdateContactRequest::class => MockResponse::make(ContactResponseStub::get()),
        ]);

        $payload = [
            'company_name' => 'Updated Company Name',
        ];

        $contact = $moneybird->contacts()->update('419889276175517682', $payload);

        $mockClient = $moneybird->getMockClient();
        $mockClient->assertSent(function ($request) {
            return $request instanceof UpdateContactRequest;
        });
        $this->assertInstanceOf(Contact::class, $contact);
        $this->assertEquals('419889276175517682', $contact->id);
    }

    public function test_delete_contact(): void
    {
        $moneybird = $this->getMoneybirdClientWithMocks([
            DeleteContactRequest::class => MockResponse::make('', 204),
        ]);

        $moneybird->contacts()->delete('419889276175517682');

        $mockClient = $moneybird->getMockClient();
        $mockClient->assertSent(function ($request) {
            return $request instanceof DeleteContactRequest;
        });
    }

    public function test_paginate_contacts(): void
    {
        $moneybird = $this->getMoneybirdClient();

        $paginator = $moneybird->contacts()->paginate();

        $this->assertInstanceOf(MoneybirdPaginator::class, $paginator);
        $this->assertEquals(0, $paginator->getCurrentPage());
    }
}
