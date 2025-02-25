<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Api\Subscriptions;

use Saloon\Http\Response;
use Sandorian\Moneybird\Api\Support\BaseJsonPostRequest;

class ResumeSubscriptionRequest extends BaseJsonPostRequest
{
    public function __construct(
        protected readonly string $subscriptionId,
    ) {
        //
    }

    public function resolveEndpoint(): string
    {
        return "subscriptions/{$this->subscriptionId}/resume";
    }

    public function createDtoFromResponse(Response $response): Subscription
    {
        return Subscription::createFromResponseData($response->json());
    }
}
