<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Api\Estimates;

use Saloon\Http\Response;
use Sandorian\Moneybird\Api\Support\BaseJsonGetRequest;

class GetEstimatesRequest extends BaseJsonGetRequest
{
    public function resolveEndpoint(): string
    {
        return 'estimates';
    }

    /**
     * @return array<Estimate>
     */
    public function createDtoFromResponse(Response $response): array
    {
        return array_map(
            fn (array $data) => Estimate::createFromResponseData($data),
            $response->json()
        );
    }
}
