<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Api\Contacts;

use Sandorian\Moneybird\Api\Contacts\AdditionalCharges\AdditionalCharge;
use Sandorian\Moneybird\Api\Contacts\AdditionalCharges\CreateAdditionalChargeRequest;
use Sandorian\Moneybird\Api\Contacts\AdditionalCharges\GetAdditionalChargesRequest;
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
        $request = new UpdateContactRequest($contactId, $data);

        return $this->client->send($request)->dtoOrFail();
    }

    public function delete(string $contactId): void
    {
        $request = new DeleteContactRequest($contactId);

        $this->client->send($request);
    }

    // ========== Additional Charges ==========

    public function createAdditionalCharge(string $contactId, array $data): AdditionalCharge
    {
        $request = new CreateAdditionalChargeRequest($contactId, $data);

        return $this->client->send($request)->dtoOrFail();
    }

    public function getAdditionalCharges(string $contactId): array
    {
        $request = new GetAdditionalChargesRequest($contactId);

        return array_map(
            fn (array $data) => AdditionalCharge::createFromResponseData($data),
            $this->client->send($request)->json()
        );
    }

    // ========== Notes ==========

    public function createNote(string $contactId, array $data): Note
    {
        $request = new CreateNoteRequest($contactId, $data);

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
        $request = new CreateContactPersonRequest($contactId, $data);

        return $this->client->send($request)->dtoOrFail();
    }

    public function updateContactPerson(string $contactId, string $contactPersonId, array $data): ContactPerson
    {
        $request = new UpdateContactPersonRequest($contactId, $contactPersonId, $data);

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
        $request = new CreateMbPaymentsMandateRequest($contactId, $data);

        return $this->client->send($request)->dtoOrFail();
    }

    public function createMbPaymentsMandateUrl(string $contactId, array $data = []): MbPaymentsMandateUrl
    {
        $request = new CreateMbPaymentsMandateUrlRequest($contactId);
        $request->setEncapsulatedData($data);

        return $this->client->send($request)->dtoOrFail();
    }

    public function deleteMbPaymentsMandate(string $contactId): void
    {
        $request = new DeleteMbPaymentsMandateRequest($contactId);

        $this->client->send($request);
    }

    protected function getCreateRequest(array $data = []): CreateContactRequest
    {
        $request = new CreateContactRequest;
        $request->setEncapsulatedData($data);

        return $request;
    }

    protected function getPaginateRequest(): GetContactsPageRequest
    {
        return new GetContactsPageRequest;
    }
}
