<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Api\FinancialMutations;

use Saloon\Http\Response;
use Sandorian\Moneybird\Api\Support\BaseJsonGetRequest;
use Sandorian\Moneybird\Api\Support\IdVersion;

class GetFinancialMutationsSynchronizationRequest extends BaseJsonGetRequest
{
    public function resolveEndpoint(): string
    {
        return 'financial_mutations/synchronization';
    }

    /**
     * @return array<IdVersion>
     */
    public function createDtoFromResponse(Response $response): array
    {
        return array_map(
            fn (array $data) => IdVersion::createFromResponseData($data),
            $response->json()
        );
    }
}
