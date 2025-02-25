<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Api\Estimates;

use Saloon\PaginationPlugin\Paginator;
use Sandorian\Moneybird\Api\Support\BaseEndpoint;
use Sandorian\Moneybird\Api\Support\IdVersion;
use Sandorian\Moneybird\Api\Support\MoneybirdPaginator;

class EstimatesEndpoint extends BaseEndpoint
{
    /**
     * @return Paginator<Estimate>
     */
    public function paginate(): Paginator
    {
        $request = new GetEstimatesRequest;

        return new MoneybirdPaginator($this->client, $request);
    }

    /**
     * @return array<Estimate>
     */
    public function all(): array
    {
        $request = new GetEstimatesRequest;

        return $this->client->send($request)->dtoOrFail();
    }

    /**
     * @return array<IdVersion>
     */
    public function synchronization(): array
    {
        $request = new GetEstimatesSynchronizationRequest;

        return $this->client->send($request)->dtoOrFail();
    }

    /**
     * @param  array<string>  $ids
     * @return array<Estimate>
     */
    public function synchronize(array $ids): array
    {
        $request = new PostEstimatesSynchronizationRequest($ids);

        return $this->client->send($request)->dtoOrFail();
    }

    public function get(string $estimateId): Estimate
    {
        $request = new GetEstimateRequest($estimateId);

        return $this->client->send($request)->dtoOrFail();
    }

    /**
     * @param  array<string, mixed>  $estimateData
     */
    public function create(array $estimateData): Estimate
    {
        $request = new CreateEstimateRequest($estimateData);

        return $this->client->send($request)->dtoOrFail();
    }

    /**
     * @param  array<string, mixed>  $estimateData
     */
    public function update(string $estimateId, array $estimateData): Estimate
    {
        $request = new UpdateEstimateRequest($estimateId, $estimateData);

        return $this->client->send($request)->dtoOrFail();
    }

    public function delete(string $estimateId): bool
    {
        $request = new DeleteEstimateRequest($estimateId);

        return $this->client->send($request)->dtoOrFail();
    }

    public function changeState(string $estimateId, string $state): Estimate
    {
        $request = new ChangeEstimateStateRequest($estimateId, $state);

        return $this->client->send($request)->dtoOrFail();
    }

    /**
     * @param  array<string, mixed>  $emailData
     */
    public function sendEmail(string $estimateId, array $emailData): Estimate
    {
        $request = new SendEstimateEmailRequest($estimateId, $emailData);

        return $this->client->send($request)->dtoOrFail();
    }

    public function getSendEmailTemplate(string $estimateId): array
    {
        $request = new GetSendEstimateEmailTemplateRequest($estimateId);

        return $this->client->send($request)->dtoOrFail();
    }

    public function duplicate(string $estimateId): Estimate
    {
        $request = new DuplicateEstimateRequest($estimateId);

        return $this->client->send($request)->dtoOrFail();
    }
}
