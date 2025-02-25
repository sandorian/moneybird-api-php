<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Api\Verifications;

use Saloon\Http\Response;
use Sandorian\Moneybird\Api\Support\BaseJsonGetRequest;

class GetVerificationsPageRequest extends BaseJsonGetRequest
{
    public function resolveEndpoint(): string
    {
        return 'verifications';
    }

    /**
     * @return array<Verification>
     */
    public function createDtoFromResponse(Response $response): array
    {
        return array_map(
            fn (array $data) => Verification::createFromResponseData($data),
            $response->json()
        );
    }
}
