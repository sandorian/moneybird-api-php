<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Api\Subscriptions;

use Saloon\Http\Response;
use Sandorian\Moneybird\Api\Support\BaseJsonGetRequest;

class GetSubscriptionsPageRequest extends BaseJsonGetRequest
{
    public function resolveEndpoint(): string
    {
        return 'subscriptions';
    }

    /**
     * @return array<Subscription>
     */
    public function createDtoFromResponse(Response $response): array
    {
        return array_map(
            fn (array $data) => Subscription::createFromResponseData($data),
            $response->json()
        );
    }
}
