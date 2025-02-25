<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Api\Projects;

use Saloon\Http\Response;
use Sandorian\Moneybird\Api\Support\BaseJsonPatchRequest;

class UpdateProjectRequest extends BaseJsonPatchRequest
{
    /**
     * @param  array<string, mixed>  $data
     */
    public function __construct(
        protected readonly string $projectId,
        protected readonly array $data,
    ) {
        //
    }

    public function resolveEndpoint(): string
    {
        return 'projects/'.$this->projectId;
    }

    protected function defaultBody(): array
    {
        return [
            'project' => $this->data,
        ];
    }

    public function createDtoFromResponse(Response $response): Project
    {
        return Project::createFromResponseData($response->json());
    }
}
