<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Api\Subscriptions;

use Sandorian\Moneybird\Api\Support\BaseJsonDeleteRequest;

class DeleteSubscriptionRequest extends BaseJsonDeleteRequest
{
    public function __construct(
        protected readonly string $subscriptionId,
    ) {
        //
    }

    public function resolveEndpoint(): string
    {
        return "subscriptions/{$this->subscriptionId}";
    }
}
