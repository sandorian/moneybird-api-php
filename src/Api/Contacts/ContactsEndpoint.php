<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Api\Contacts;

use Sandorian\Moneybird\Api\Contacts\ContactPeople\ContactPerson;
use Sandorian\Moneybird\Api\Contacts\ContactPeople\CreateContactPersonRequest;
use Sandorian\Moneybird\Api\Contacts\ContactPeople\DeleteContactPersonRequest;
use Sandorian\Moneybird\Api\Contacts\ContactPeople\GetContactPersonRequest;
use Sandorian\Moneybird\Api\Contacts\ContactPeople\UpdateContactPersonRequest;
use Sandorian\Moneybird\Api\Contacts\MbPaymentsMandate\CreateMbPaymentsMandateRequest;
use Sandorian\Moneybird\Api\Contacts\MbPaymentsMandate\CreateMbPaymentsMandateUrlRequest;
use Sandorian\Moneybird\Api\Contacts\MbPaymentsMandate\DeleteMbPaymentsMandateRequest;
use Sandorian\Moneybird\Api\Contacts\MbPaymentsMandate\GetMbPaymentsMandateRequest;
use Sandorian\Moneybird\Api\Contacts\MbPaymentsMandate\MbPaymentsMandate;
use Sandorian\Moneybird\Api\Contacts\MbPaymentsMandate\MbPaymentsMandateUrl;
use Sandorian\Moneybird\Api\Contacts\Notes\CreateNoteRequest;
use Sandorian\Moneybird\Api\Contacts\Notes\DeleteNoteRequest;
use Sandorian\Moneybird\Api\Contacts\Notes\Note;
use Sandorian\Moneybird\Api\Contacts\UsageCharges\CreateUsageChargeRequest;
use Sandorian\Moneybird\Api\Contacts\UsageCharges\GetUsageChargesRequest;
use Sandorian\Moneybird\Api\Contacts\UsageCharges\UsageCharge;
use Sandorian\Moneybird\Api\Support\BaseEndpoint;
use Sandorian\Moneybird\Api\Support\MoneybirdPaginator;

/**
 * @method Contact create(array $data)
 * @method MoneybirdPaginator paginate()
 */
class ContactsEndpoint extends BaseEndpoint
{
    public function get(string $contactId): Contact
    {
        $request = new GetContactRequest($contactId);

        return $this->client->send($request)->dtoOrFail();
    }

    public function getByCustomerId(string $customerId): Contact
    {
        $request = new GetContactByCustomerIdRequest($customerId);

        return $this->client->send($request)->dtoOrFail();
    }

    public function filter(array $filters = []): MoneybirdPaginator
    {
        $request = new FilterContactsRequest($filters);

        return new MoneybirdPaginator($this->client, $request);
    }

    public function getSynchronization(): array
    {
        $request = new GetContactsSynchronizationRequest;

        return $this->client->send($request)->json();
    }

    public function synchronize(array $ids): array
    {
        $request = new SynchronizeContactsRequest;
        $request->body()->merge(['ids' => $ids]);

        return $this->client->send($request)->json();
    }

    public function update(string $contactId, array $data): Contact
    {
        $request = new UpdateContactRequest($contactId);
        $request->setEncapsulatedData($data);

        return $this->client->send($request)->dtoOrFail();
    }

    public function delete(string $contactId): void
    {
        $request = new DeleteContactRequest($contactId);

        $this->client->send($request);
    }

    // ========== Usage Charges ==========

    public function createUsageCharge(string $contactId, array $data): UsageCharge
    {
        $request = new CreateUsageChargeRequest($contactId);
        if (method_exists($request, 'setEncapsulatedData')) {
            $request->setEncapsulatedData($data);
        } else {
            $request->body()->merge($data);
        }

        return $this->client->send($request)->dtoOrFail();
    }

    public function getUsageCharges(string $contactId): array
    {
        $request = new GetUsageChargesRequest($contactId);

        return array_map(
            fn (array $data) => UsageCharge::createFromResponseData($data),
            $this->client->send($request)->json()
        );
    }

    // ========== Notes ==========

    public function createNote(string $contactId, array $data): Note
    {
        $request = new CreateNoteRequest($contactId);
        if (method_exists($request, 'setEncapsulatedData')) {
            $request->setEncapsulatedData($data);
        } else {
            $request->body()->merge($data);
        }

        return $this->client->send($request)->dtoOrFail();
    }

    public function deleteNote(string $contactId, string $noteId): void
    {
        $request = new DeleteNoteRequest($contactId, $noteId);

        $this->client->send($request);
    }

    // ========== Contact People ==========

    public function getContactPerson(string $contactId, string $contactPersonId): ContactPerson
    {
        $request = new GetContactPersonRequest($contactId, $contactPersonId);

        return $this->client->send($request)->dtoOrFail();
    }

    public function createContactPerson(string $contactId, array $data): ContactPerson
    {
        $request = new CreateContactPersonRequest($contactId);
        if (method_exists($request, 'setEncapsulatedData')) {
            $request->setEncapsulatedData($data);
        } else {
            $request->body()->merge($data);
        }

        return $this->client->send($request)->dtoOrFail();
    }

    public function updateContactPerson(string $contactId, string $contactPersonId, array $data): ContactPerson
    {
        $request = new UpdateContactPersonRequest($contactId, $contactPersonId);
        if (method_exists($request, 'setEncapsulatedData')) {
            $request->setEncapsulatedData($data);
        } else {
            $request->body()->merge($data);
        }

        return $this->client->send($request)->dtoOrFail();
    }

    public function deleteContactPerson(string $contactId, string $contactPersonId): void
    {
        $request = new DeleteContactPersonRequest($contactId, $contactPersonId);

        $this->client->send($request);
    }

    // ========== Moneybird Payments Mandate ==========

    public function getMbPaymentsMandate(string $contactId): MbPaymentsMandate
    {
        $request = new GetMbPaymentsMandateRequest($contactId);

        return $this->client->send($request)->dtoOrFail();
    }

    public function createMbPaymentsMandate(string $contactId, array $data = []): MbPaymentsMandate
    {
        $request = new CreateMbPaymentsMandateRequest($contactId);
        if (! empty($data)) {
            if (method_exists($request, 'setEncapsulatedData')) {
                $request->setEncapsulatedData($data);
            } else {
                $request->body()->merge($data);
            }
        }

        return $this->client->send($request)->dtoOrFail();
    }

    public function createMbPaymentsMandateUrl(string $contactId, array $data = []): MbPaymentsMandateUrl
    {
        $request = new CreateMbPaymentsMandateUrlRequest($contactId);
        if (! empty($data)) {
            if (method_exists($request, 'setEncapsulatedData')) {
                $request->setEncapsulatedData($data);
            } else {
                $request->body()->merge($data);
            }
        }

        return $this->client->send($request)->dtoOrFail();
    }

    public function deleteMbPaymentsMandate(string $contactId): void
    {
        $request = new DeleteMbPaymentsMandateRequest($contactId);

        $this->client->send($request);
    }

    protected function getCreateRequest(): CreateContactRequest
    {
        return new CreateContactRequest;
    }

    protected function getPaginateRequest(): GetContactsPageRequest
    {
        return new GetContactsPageRequest;
    }
}
