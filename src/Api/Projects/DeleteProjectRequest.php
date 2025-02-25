<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Api\Projects;

use Saloon\Http\Response;
use Sandorian\Moneybird\Api\Support\BaseJsonDeleteRequest;

class DeleteProjectRequest extends BaseJsonDeleteRequest
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

    public function createDtoFromResponse(Response $response): bool
    {
        return $response->status() === 204;
    }
}
