<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Api\Payments;

use Saloon\Http\Response;
use Sandorian\Moneybird\Api\Support\BaseJsonGetRequest;

class GetPaymentsRequest extends BaseJsonGetRequest
{
    public function resolveEndpoint(): string
    {
        return 'payments';
    }

    /**
     * @return array<Payment>
     */
    public function createDtoFromResponse(Response $response): array
    {
        return array_map(
            fn (array $data) => Payment::createFromResponseData($data),
            $response->json()
        );
    }
}
