<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Tests\Api\Contacts;

use Saloon\Http\Faking\MockResponse;
use Sandorian\Moneybird\Api\Contacts\Contact;
use Sandorian\Moneybird\Api\Contacts\ContactPeople\ContactPerson;
use Sandorian\Moneybird\Api\Contacts\ContactPeople\CreateContactPersonRequest;
use Sandorian\Moneybird\Api\Contacts\ContactPeople\DeleteContactPersonRequest;
use Sandorian\Moneybird\Api\Contacts\ContactPeople\GetContactPersonRequest;
use Sandorian\Moneybird\Api\Contacts\ContactPeople\UpdateContactPersonRequest;
use Sandorian\Moneybird\Api\Contacts\CreateContactRequest;
use Sandorian\Moneybird\Api\Contacts\DeleteContactRequest;
use Sandorian\Moneybird\Api\Contacts\GetContactByCustomerIdRequest;
use Sandorian\Moneybird\Api\Contacts\GetContactRequest;
use Sandorian\Moneybird\Api\Contacts\GetContactsSynchronizationRequest;
use Sandorian\Moneybird\Api\Contacts\MbPaymentsMandate\CreateMbPaymentsMandateRequest;
use Sandorian\Moneybird\Api\Contacts\MbPaymentsMandate\CreateMbPaymentsMandateUrlRequest;
use Sandorian\Moneybird\Api\Contacts\MbPaymentsMandate\DeleteMbPaymentsMandateRequest;
use Sandorian\Moneybird\Api\Contacts\MbPaymentsMandate\GetMbPaymentsMandateRequest;
use Sandorian\Moneybird\Api\Contacts\MbPaymentsMandate\MbPaymentsMandate;
use Sandorian\Moneybird\Api\Contacts\MbPaymentsMandate\MbPaymentsMandateUrl;
use Sandorian\Moneybird\Api\Contacts\Notes\CreateNoteRequest;
use Sandorian\Moneybird\Api\Contacts\Notes\DeleteNoteRequest;
use Sandorian\Moneybird\Api\Contacts\Notes\Note;
use Sandorian\Moneybird\Api\Contacts\SynchronizeContactsRequest;
use Sandorian\Moneybird\Api\Contacts\UpdateContactRequest;
use Sandorian\Moneybird\Api\Contacts\UsageCharges\CreateUsageChargeRequest;
use Sandorian\Moneybird\Api\Contacts\UsageCharges\GetUsageChargesRequest;
use Sandorian\Moneybird\Api\Contacts\UsageCharges\UsageCharge;
use Sandorian\Moneybird\Api\Support\MoneybirdPaginator;
use Sandorian\Moneybird\Tests\Api\BaseTestCase;
use Sandorian\Moneybird\Tests\Api\Contacts\ContactPeople\ContactPeopleResponseStub;
use Sandorian\Moneybird\Tests\Api\Contacts\MbPaymentsMandate\MbPaymentsMandateResponseStub;
use Sandorian\Moneybird\Tests\Api\Contacts\Notes\NotesResponseStub;
use Sandorian\Moneybird\Tests\Api\Contacts\UsageCharges\UsageChargesResponseStub;

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

        $this->assertSentOnce($mockClient, ['contact' => $payload]);
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
        $mockClient->assertSent(function ($request) use ($payload) {
            return $request instanceof UpdateContactRequest
                && $request->body()->all() === ['contact' => $payload];
        });
        $this->assertInstanceOf(Contact::class, $contact);
        $this->assertEquals('419889276175517682', $contact->id);
    }

    public function test_delete_contact(): void
    {
        $moneybird = $this->getMoneybirdClientWithMocks([
            DeleteContactRequest::class => MockResponse::make('', 204),
        ]);

        $moneybird->contacts()->delete('123456789');

        $this->expectNotToPerformAssertions();
    }

    public function test_paginate_contacts(): void
    {
        $moneybird = $this->getMoneybirdClient();

        $paginator = $moneybird->contacts()->paginate();

        $this->assertInstanceOf(MoneybirdPaginator::class, $paginator);
        $this->assertEquals(0, $paginator->getCurrentPage());
    }

    // ========== Usage Charges Tests ==========

    public function test_create_usage_charge(): void
    {
        $moneybird = $this->getMoneybirdClientWithMocks([
            CreateUsageChargeRequest::class => MockResponse::make(UsageChargesResponseStub::create()),
        ]);

        $usageCharge = $moneybird->contacts()->createUsageCharge('987654321', [
            'description' => 'Test Usage Charge',
            'price' => '10.00',
            'period' => 'monthly',
        ]);

        $this->assertInstanceOf(UsageCharge::class, $usageCharge);
        $this->assertEquals('123456789', $usageCharge->id);
        $this->assertEquals('987654321', $usageCharge->contact_id);
        $this->assertEquals('Test Usage Charge', $usageCharge->description);
        $this->assertEquals('10.00', $usageCharge->price);
        $this->assertEquals('monthly', $usageCharge->period);
    }

    public function test_get_usage_charges(): void
    {
        $moneybird = $this->getMoneybirdClientWithMocks([
            GetUsageChargesRequest::class => MockResponse::make(UsageChargesResponseStub::getAll()),
        ]);

        $usageCharges = $moneybird->contacts()->getUsageCharges('987654321');

        $this->assertIsArray($usageCharges);
        $this->assertCount(2, $usageCharges);
        $this->assertInstanceOf(UsageCharge::class, $usageCharges[0]);
        $this->assertEquals('123456789', $usageCharges[0]->id);
        $this->assertEquals('987654321', $usageCharges[0]->contact_id);
        $this->assertEquals('Test Usage Charge', $usageCharges[0]->description);
        $this->assertEquals('10.00', $usageCharges[0]->price);
        $this->assertEquals('monthly', $usageCharges[0]->period);
        $this->assertEquals('987654321', $usageCharges[1]->id);
        $this->assertEquals('Another Usage Charge', $usageCharges[1]->description);
    }

    // ========== Notes Tests ==========

    public function test_create_note(): void
    {
        $moneybird = $this->getMoneybirdClientWithMocks([
            CreateNoteRequest::class => MockResponse::make(NotesResponseStub::create()),
        ]);

        $note = $moneybird->contacts()->createNote('987654321', [
            'note' => 'Test Note',
            'todo' => false,
        ]);

        $this->assertInstanceOf(Note::class, $note);
        $this->assertEquals('123456789', $note->id);
        $this->assertEquals('Test Note', $note->note);
        $this->assertEquals('false', $note->todo);
    }

    public function test_delete_note(): void
    {
        $moneybird = $this->getMoneybirdClientWithMocks([
            DeleteNoteRequest::class => MockResponse::make('', 204),
        ]);

        $moneybird->contacts()->deleteNote('987654321', '123456789');

        $this->expectNotToPerformAssertions();
    }

    // ========== Contact People Tests ==========

    public function test_get_contact_person(): void
    {
        $moneybird = $this->getMoneybirdClientWithMocks([
            GetContactPersonRequest::class => MockResponse::make(ContactPeopleResponseStub::get()),
        ]);

        $contactPerson = $moneybird->contacts()->getContactPerson('987654321', '123456789');

        $this->assertInstanceOf(ContactPerson::class, $contactPerson);
        $this->assertEquals('123456789', $contactPerson->id);
        $this->assertEquals('987654321', $contactPerson->contact_id);
        $this->assertEquals('John', $contactPerson->firstname);
        $this->assertEquals('Doe', $contactPerson->lastname);
        $this->assertEquals('john.doe@example.com', $contactPerson->email);
    }

    public function test_create_contact_person(): void
    {
        $moneybird = $this->getMoneybirdClientWithMocks([
            CreateContactPersonRequest::class => MockResponse::make(ContactPeopleResponseStub::create()),
        ]);

        $contactPerson = $moneybird->contacts()->createContactPerson('987654321', [
            'firstname' => 'John',
            'lastname' => 'Doe',
            'email' => 'john.doe@example.com',
        ]);

        $this->assertInstanceOf(ContactPerson::class, $contactPerson);
        $this->assertEquals('123456789', $contactPerson->id);
        $this->assertEquals('987654321', $contactPerson->contact_id);
        $this->assertEquals('John', $contactPerson->firstname);
        $this->assertEquals('Doe', $contactPerson->lastname);
        $this->assertEquals('john.doe@example.com', $contactPerson->email);
    }

    public function test_update_contact_person(): void
    {
        $moneybird = $this->getMoneybirdClientWithMocks([
            UpdateContactPersonRequest::class => MockResponse::make(ContactPeopleResponseStub::update()),
        ]);

        $contactPerson = $moneybird->contacts()->updateContactPerson('987654321', '123456789', [
            'firstname' => 'John',
            'lastname' => 'Smith',
            'email' => 'john.smith@example.com',
        ]);

        $this->assertInstanceOf(ContactPerson::class, $contactPerson);
        $this->assertEquals('123456789', $contactPerson->id);
        $this->assertEquals('987654321', $contactPerson->contact_id);
        $this->assertEquals('John', $contactPerson->firstname);
        $this->assertEquals('Smith', $contactPerson->lastname);
        $this->assertEquals('john.smith@example.com', $contactPerson->email);
    }

    public function test_delete_contact_person(): void
    {
        $moneybird = $this->getMoneybirdClientWithMocks([
            DeleteContactPersonRequest::class => MockResponse::make('', 204),
        ]);

        $moneybird->contacts()->deleteContactPerson('987654321', '123456789');

        $this->expectNotToPerformAssertions();
    }

    // ========== Moneybird Payments Mandate Tests ==========

    public function test_get_mb_payments_mandate(): void
    {
        $moneybird = $this->getMoneybirdClientWithMocks([
            GetMbPaymentsMandateRequest::class => MockResponse::make(MbPaymentsMandateResponseStub::get()),
        ]);

        $mandate = $moneybird->contacts()->getMbPaymentsMandate('987654321');

        $this->assertInstanceOf(MbPaymentsMandate::class, $mandate);
        $this->assertEquals('123456789', $mandate->id);
        $this->assertEquals('987654321', $mandate->contact_id);
        $this->assertEquals('MB123456789', $mandate->mandate_id);
        $this->assertEquals('FLOW123456789', $mandate->flow_id);
        $this->assertEquals('active', $mandate->state);
    }

    public function test_create_mb_payments_mandate(): void
    {
        $moneybird = $this->getMoneybirdClientWithMocks([
            CreateMbPaymentsMandateRequest::class => MockResponse::make(MbPaymentsMandateResponseStub::create()),
        ]);

        $mandate = $moneybird->contacts()->createMbPaymentsMandate('987654321');

        $this->assertInstanceOf(MbPaymentsMandate::class, $mandate);
        $this->assertEquals('123456789', $mandate->id);
        $this->assertEquals('987654321', $mandate->contact_id);
        $this->assertEquals('MB123456789', $mandate->mandate_id);
        $this->assertEquals('FLOW123456789', $mandate->flow_id);
        $this->assertEquals('active', $mandate->state);
    }

    public function test_create_mb_payments_mandate_url(): void
    {
        $moneybird = $this->getMoneybirdClientWithMocks([
            CreateMbPaymentsMandateUrlRequest::class => MockResponse::make(MbPaymentsMandateResponseStub::createUrl()),
        ]);

        $mandateUrl = $moneybird->contacts()->createMbPaymentsMandateUrl('987654321');

        $this->assertInstanceOf(MbPaymentsMandateUrl::class, $mandateUrl);
        $this->assertEquals('https://moneybird.com/mandate/setup/123456789', $mandateUrl->url);
    }

    public function test_delete_mb_payments_mandate(): void
    {
        $moneybird = $this->getMoneybirdClientWithMocks([
            DeleteMbPaymentsMandateRequest::class => MockResponse::make('', 204),
        ]);

        $moneybird->contacts()->deleteMbPaymentsMandate('987654321');

        $this->expectNotToPerformAssertions();
    }
}
