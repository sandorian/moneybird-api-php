<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Api\Subscriptions;

use Saloon\Http\Response;
use Sandorian\Moneybird\Api\Support\BaseJsonPostRequest;

class CreateSubscriptionRequest extends BaseJsonPostRequest
{
    public function resolveEndpoint(): string
    {
        return 'subscriptions';
    }

    public function createDtoFromResponse(Response $response): Subscription
    {
        return Subscription::createFromResponseData($response->json());
    }
}
