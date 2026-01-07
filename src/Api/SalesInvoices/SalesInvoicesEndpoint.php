<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Api\SalesInvoices;

use Saloon\PaginationPlugin\Paginator;
use Sandorian\Moneybird\Api\SalesInvoices\Payments\DeleteSalesInvoicePaymentRequest;
use Sandorian\Moneybird\Api\SalesInvoices\Payments\SalesInvoicePaymentsEndpoint;
use Sandorian\Moneybird\Api\Support\BaseEndpoint;
use Sandorian\Moneybird\Api\Support\IdVersion;

class SalesInvoicesEndpoint extends BaseEndpoint
{
    public function create(array $data): SalesInvoice
    {
        $request = new CreateSalesInvoiceRequest($data);
        $response = $this->client->send($request);

        return $request->createDtoFromResponse($response);
    }

    public function get(string $id): SalesInvoice
    {
        $request = new GetSalesInvoiceRequest($id);
        $response = $this->client->send($request);

        return $request->createDtoFromResponse($response);
    }

    public function findByInvoiceId(string $invoiceId): SalesInvoice
    {
        $request = new FindSalesInvoiceByInvoiceIdRequest($invoiceId);
        $response = $this->client->send($request);

        return $request->createDtoFromResponse($response);
    }

    public function findByReference(string $reference): SalesInvoice
    {
        $request = new FindSalesInvoiceByReferenceRequest($reference);
        $response = $this->client->send($request);

        return $request->createDtoFromResponse($response);
    }

    public function duplicateToCreditInvoice(string $salesInvoiceId): SalesInvoice
    {
        $request = new DuplicateSalesInvoiceToCreditInvoiceRequest($salesInvoiceId);
        $response = $this->client->send($request);

        return SalesInvoice::createFromResponseData($response->json());
    }

    public function paginate(): Paginator
    {
        $request = new GetSalesInvoicesPageRequest;

        return $this->client->paginate($request);
    }

    public function payments(): SalesInvoicePaymentsEndpoint
    {
        return new SalesInvoicePaymentsEndpoint($this->client);
    }

    /**
     * @return array<IdVersion>
     */
    public function synchronization(): array
    {
        $request = new GetSalesInvoicesSynchronizationRequest;

        return $this->client->send($request)->dtoOrFail();
    }

    /**
     * @param  array<string>  $ids
     * @return array<SalesInvoice>
     */
    public function synchronize(array $ids): array
    {
        $request = new PostSalesInvoicesSynchronizationRequest($ids);

        return $this->client->send($request)->dtoOrFail();
    }

    public function update(string $salesInvoiceId, array $data): SalesInvoice
    {
        $request = new UpdateSalesInvoiceRequest($salesInvoiceId, $data);
        $response = $this->client->send($request);

        return $request->createDtoFromResponse($response);
    }

    public function delete(string $salesInvoiceId): void
    {
        $request = new DeleteSalesInvoiceRequest($salesInvoiceId);
        $this->client->send($request);
    }

    public function deletePayment(string $salesInvoiceId, string $paymentId): void
    {
        $request = new DeleteSalesInvoicePaymentRequest($salesInvoiceId, $paymentId);
        $this->client->send($request);
    }

    /**
     * @param  array<string, mixed>  $sendingData  Optional data like delivery_method, email_address, email_message
     */
    public function sendEmail(string $salesInvoiceId, array $sendingData = []): SalesInvoice
    {
        $request = new SendSalesInvoiceEmailRequest($salesInvoiceId, $sendingData);
        $response = $this->client->send($request);

        return $request->createDtoFromResponse($response);
    }

    public function getEmailTemplate(string $salesInvoiceId): array
    {
        $request = new GetSalesInvoiceEmailTemplateRequest($salesInvoiceId);
        $response = $this->client->send($request);

        return $request->createDtoFromResponse($response);
    }

    public function sendReminder(string $salesInvoiceId): SalesInvoice
    {
        $request = new SendSalesInvoiceReminderRequest($salesInvoiceId);
        $response = $this->client->send($request);

        return $request->createDtoFromResponse($response);
    }

    public function getReminderTemplate(string $salesInvoiceId): array
    {
        $request = new GetSalesInvoiceReminderTemplateRequest($salesInvoiceId);
        $response = $this->client->send($request);

        return $request->createDtoFromResponse($response);
    }

    public function sendInvoiceReminder(string $salesInvoiceId): SalesInvoice
    {
        $request = new SendInvoiceReminderRequest($salesInvoiceId);
        $response = $this->client->send($request);

        return $request->createDtoFromResponse($response);
    }

    public function getInvoiceReminderTemplate(string $salesInvoiceId): array
    {
        $request = new GetInvoiceReminderTemplateRequest($salesInvoiceId);
        $response = $this->client->send($request);

        return $request->createDtoFromResponse($response);
    }

    public function sendPaymentReminder(string $salesInvoiceId): SalesInvoice
    {
        $request = new SendPaymentReminderRequest($salesInvoiceId);
        $response = $this->client->send($request);

        return $request->createDtoFromResponse($response);
    }

    public function getPaymentReminderTemplate(string $salesInvoiceId): array
    {
        $request = new GetPaymentReminderTemplateRequest($salesInvoiceId);
        $response = $this->client->send($request);

        return $request->createDtoFromResponse($response);
    }

    public function sendPost(string $salesInvoiceId): SalesInvoice
    {
        $request = new SendSalesInvoicePostRequest($salesInvoiceId);
        $response = $this->client->send($request);

        return $request->createDtoFromResponse($response);
    }

    public function markAsSent(string $salesInvoiceId): SalesInvoice
    {
        $request = new MarkSalesInvoiceAsSentRequest($salesInvoiceId);
        $response = $this->client->send($request);

        return $request->createDtoFromResponse($response);
    }

    public function markAsAccepted(string $salesInvoiceId): SalesInvoice
    {
        $request = new MarkSalesInvoiceAsAcceptedRequest($salesInvoiceId);
        $response = $this->client->send($request);

        return $request->createDtoFromResponse($response);
    }

    public function markAsPaid(string $salesInvoiceId): SalesInvoice
    {
        $request = new MarkSalesInvoiceAsPaidRequest($salesInvoiceId);
        $response = $this->client->send($request);

        return $request->createDtoFromResponse($response);
    }

    /**
     * @param  array<string, mixed>  $data  Optional: uncollectible_date, book_method
     */
    public function markAsUncollectible(string $salesInvoiceId, array $data = []): SalesInvoice
    {
        $request = new MarkSalesInvoiceAsUncollectibleRequest($salesInvoiceId, $data);
        $response = $this->client->send($request);

        return $request->createDtoFromResponse($response);
    }

    public function markAsPublished(string $salesInvoiceId): SalesInvoice
    {
        $request = new MarkSalesInvoiceAsPublishedRequest($salesInvoiceId);
        $response = $this->client->send($request);

        return $request->createDtoFromResponse($response);
    }

    public function markAsUnpublished(string $salesInvoiceId): SalesInvoice
    {
        $request = new MarkSalesInvoiceAsUnpublishedRequest($salesInvoiceId);
        $response = $this->client->send($request);

        return $request->createDtoFromResponse($response);
    }

    public function duplicate(string $salesInvoiceId): SalesInvoice
    {
        $request = new DuplicateSalesInvoiceRequest($salesInvoiceId);
        $response = $this->client->send($request);

        return $request->createDtoFromResponse($response);
    }
}
