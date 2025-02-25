<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Api\RecurringSalesInvoices;

use Saloon\PaginationPlugin\Paginator;
use Sandorian\Moneybird\Api\Support\BaseEndpoint;
use Sandorian\Moneybird\Api\Support\IdVersion;
use Sandorian\Moneybird\Api\Support\MoneybirdPaginator;

class RecurringSalesInvoicesEndpoint extends BaseEndpoint
{
    /**
     * @return Paginator<RecurringSalesInvoice>
     */
    public function paginate(): Paginator
    {
        $request = new GetRecurringSalesInvoicesRequest;

        return new MoneybirdPaginator($this->client, $request);
    }

    /**
     * @return array<RecurringSalesInvoice>
     */
    public function all(): array
    {
        $request = new GetRecurringSalesInvoicesRequest;

        return $this->client->send($request)->dtoOrFail();
    }

    /**
     * @return array<IdVersion>
     */
    public function synchronization(): array
    {
        $request = new GetRecurringSalesInvoicesSynchronizationRequest;

        return $this->client->send($request)->dtoOrFail();
    }

    /**
     * @param  array<string>  $ids
     * @return array<RecurringSalesInvoice>
     */
    public function synchronize(array $ids): array
    {
        $request = new PostRecurringSalesInvoicesSynchronizationRequest($ids);

        return $this->client->send($request)->dtoOrFail();
    }

    public function get(string $recurringSalesInvoiceId): RecurringSalesInvoice
    {
        $request = new GetRecurringSalesInvoiceRequest($recurringSalesInvoiceId);

        return $this->client->send($request)->dtoOrFail();
    }

    /**
     * @param  array<string, mixed>  $data
     */
    public function create(array $data): RecurringSalesInvoice
    {
        $request = new CreateRecurringSalesInvoiceRequest($data);

        return $this->client->send($request)->dtoOrFail();
    }

    /**
     * @param  array<string, mixed>  $data
     */
    public function update(string $recurringSalesInvoiceId, array $data): RecurringSalesInvoice
    {
        $request = new UpdateRecurringSalesInvoiceRequest($recurringSalesInvoiceId, $data);

        return $this->client->send($request)->dtoOrFail();
    }

    public function delete(string $recurringSalesInvoiceId): bool
    {
        $request = new DeleteRecurringSalesInvoiceRequest($recurringSalesInvoiceId);

        return $this->client->send($request)->dtoOrFail();
    }
}
