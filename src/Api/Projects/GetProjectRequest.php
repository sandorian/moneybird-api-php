<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Api\Projects;

use Saloon\Http\Response;
use Sandorian\Moneybird\Api\Support\BaseJsonGetRequest;

class GetProjectRequest extends BaseJsonGetRequest
{
    public function __construct(
        protected readonly string $projectId,
    ) {
        //
    }

    public function resolveEndpoint(): string
    {
        return 'projects/'.$this->projectId;
    }

    public function createDtoFromResponse(Response $response): Project
    {
        return Project::createFromResponseData($response->json());
    }
}
