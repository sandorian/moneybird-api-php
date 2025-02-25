<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Api\Projects;

use Saloon\PaginationPlugin\Paginator;
use Sandorian\Moneybird\Api\Support\BaseEndpoint;
use Sandorian\Moneybird\Api\Support\MoneybirdPaginator;

class ProjectsEndpoint extends BaseEndpoint
{
    /**
     * @return Paginator<Project>
     */
    public function paginate(): Paginator
    {
        $request = new GetProjectsRequest;

        return new MoneybirdPaginator($this->client, $request);
    }

    /**
     * @return array<Project>
     */
    public function all(): array
    {
        $request = new GetProjectsRequest;

        return $this->client->send($request)->dtoOrFail();
    }

    public function get(string $projectId): Project
    {
        $request = new GetProjectRequest($projectId);

        return $this->client->send($request)->dtoOrFail();
    }

    /**
     * @param  array<string, mixed>  $data
     */
    public function create(array $data): Project
    {
        $request = new CreateProjectRequest($data);

        return $this->client->send($request)->dtoOrFail();
    }

    /**
     * @param  array<string, mixed>  $data
     */
    public function update(string $projectId, array $data): Project
    {
        $request = new UpdateProjectRequest($projectId, $data);

        return $this->client->send($request)->dtoOrFail();
    }

    public function delete(string $projectId): bool
    {
        $request = new DeleteProjectRequest($projectId);

        return $this->client->send($request)->dtoOrFail();
    }
}
