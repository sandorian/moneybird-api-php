<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Api\FinancialStatements;

use Saloon\PaginationPlugin\Paginator;
use Sandorian\Moneybird\Api\Support\BaseEndpoint;
use Sandorian\Moneybird\Api\Support\IdVersion;
use Sandorian\Moneybird\Api\Support\MoneybirdPaginator;

class FinancialStatementsEndpoint extends BaseEndpoint
{
    /**
     * @return Paginator<FinancialStatement>
     */
    public function paginate(): Paginator
    {
        $request = new GetFinancialStatementsRequest;

        return new MoneybirdPaginator($this->client, $request);
    }

    /**
     * @return array<FinancialStatement>
     */
    public function all(): array
    {
        $request = new GetFinancialStatementsRequest;

        return $this->client->send($request)->dtoOrFail();
    }

    /**
     * @return array<IdVersion>
     */
    public function synchronization(): array
    {
        $request = new GetFinancialStatementsSynchronizationRequest;

        return $this->client->send($request)->dtoOrFail();
    }

    /**
     * @param  array<string>  $ids
     * @return array<FinancialStatement>
     */
    public function synchronize(array $ids): array
    {
        $request = new PostFinancialStatementsSynchronizationRequest($ids);

        return $this->client->send($request)->dtoOrFail();
    }

    public function get(string $financialStatementId): FinancialStatement
    {
        $request = new GetFinancialStatementRequest($financialStatementId);

        return $this->client->send($request)->dtoOrFail();
    }

    /**
     * @param  array<string, mixed>  $data
     */
    public function create(array $data): FinancialStatement
    {
        $request = new CreateFinancialStatementRequest($data);
        if (method_exists($request, 'setEncapsulatedData')) {
            $request->setEncapsulatedData($data);
        }

        return $this->client->send($request)->dtoOrFail();
    }

    /**
     * @param  array<string, mixed>  $data
     */
    public function update(string $financialStatementId, array $data): FinancialStatement
    {
        $request = new UpdateFinancialStatementRequest($financialStatementId, $data);
        if (method_exists($request, 'setEncapsulatedData')) {
            $request->setEncapsulatedData($data);
        }

        return $this->client->send($request)->dtoOrFail();
    }

    public function delete(string $financialStatementId): bool
    {
        $request = new DeleteFinancialStatementRequest($financialStatementId);

        return $this->client->send($request)->dtoOrFail();
    }
}
