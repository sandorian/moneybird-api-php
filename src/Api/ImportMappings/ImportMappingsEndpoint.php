<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Api\ImportMappings;

use Saloon\PaginationPlugin\Paginator;
use Sandorian\Moneybird\Api\Support\BaseEndpoint;
use Sandorian\Moneybird\Api\Support\MoneybirdPaginator;

class ImportMappingsEndpoint extends BaseEndpoint
{
    /**
     * @return Paginator<ImportMapping>
     */
    public function paginate(): Paginator
    {
        $request = new GetImportMappingsRequest;

        return new MoneybirdPaginator($this->client, $request);
    }

    /**
     * @return array<ImportMapping>
     */
    public function all(): array
    {
        $request = new GetImportMappingsRequest;

        return $this->client->send($request)->dtoOrFail();
    }

    public function get(string $importMappingId): ImportMapping
    {
        $request = new GetImportMappingRequest($importMappingId);

        return $this->client->send($request)->dtoOrFail();
    }

    /**
     * @param  array<string, mixed>  $data
     */
    public function create(array $data): ImportMapping
    {
        $request = new CreateImportMappingRequest($data);

        return $this->client->send($request)->dtoOrFail();
    }

    /**
     * @param  array<string, mixed>  $data
     */
    public function update(string $importMappingId, array $data): ImportMapping
    {
        $request = new UpdateImportMappingRequest($importMappingId, $data);

        return $this->client->send($request)->dtoOrFail();
    }

    public function delete(string $importMappingId): bool
    {
        $request = new DeleteImportMappingRequest($importMappingId);

        return $this->client->send($request)->dtoOrFail();
    }
}
