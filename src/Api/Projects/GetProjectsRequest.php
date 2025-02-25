<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Api\Projects;

use Saloon\Http\Response;
use Sandorian\Moneybird\Api\Support\BaseJsonGetRequest;

class GetProjectsRequest extends BaseJsonGetRequest
{
    public function resolveEndpoint(): string
    {
        return 'projects';
    }

    /**
     * @return array<Project>
     */
    public function createDtoFromResponse(Response $response): array
    {
        return array_map(
            fn (array $data) => Project::createFromResponseData($data),
            $response->json()
        );
    }
}
