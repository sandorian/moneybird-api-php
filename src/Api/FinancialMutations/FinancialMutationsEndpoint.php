<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Api\FinancialMutations;

use Saloon\PaginationPlugin\Paginator;
use Sandorian\Moneybird\Api\Support\BaseEndpoint;
use Sandorian\Moneybird\Api\Support\IdVersion;
use Sandorian\Moneybird\Api\Support\MoneybirdPaginator;

class FinancialMutationsEndpoint extends BaseEndpoint
{
    /**
     * @return Paginator<FinancialMutation>
     */
    public function paginate(): Paginator
    {
        $request = new GetFinancialMutationsRequest;

        return new MoneybirdPaginator($this->client, $request);
    }

    /**
     * @return array<FinancialMutation>
     */
    public function all(): array
    {
        $request = new GetFinancialMutationsRequest;

        return $this->client->send($request)->dtoOrFail();
    }

    /**
     * @return array<IdVersion>
     */
    public function synchronization(): array
    {
        $request = new GetFinancialMutationsSynchronizationRequest;

        return $this->client->send($request)->dtoOrFail();
    }

    /**
     * @param  array<string>  $ids
     * @return array<FinancialMutation>
     */
    public function synchronize(array $ids): array
    {
        $request = new PostFinancialMutationsSynchronizationRequest($ids);

        return $this->client->send($request)->dtoOrFail();
    }

    public function get(string $financialMutationId): FinancialMutation
    {
        $request = new GetFinancialMutationRequest($financialMutationId);

        return $this->client->send($request)->dtoOrFail();
    }

    /**
     * @param  array<string, mixed>  $body
     */
    public function update(string $financialMutationId, array $body): FinancialMutation
    {
        $request = new UpdateFinancialMutationRequest($financialMutationId, $body);

        return $this->client->send($request)->dtoOrFail();
    }

    /**
     * @param  array<string, mixed>  $body
     */
    public function linkBooking(string $financialMutationId, array $body): FinancialMutation
    {
        $request = new LinkBookingToFinancialMutationRequest($financialMutationId, $body);

        return $this->client->send($request)->dtoOrFail();
    }
}
