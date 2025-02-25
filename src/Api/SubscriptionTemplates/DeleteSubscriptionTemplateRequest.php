<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Api\SubscriptionTemplates;

use Sandorian\Moneybird\Api\Support\BaseJsonDeleteRequest;

class DeleteSubscriptionTemplateRequest extends BaseJsonDeleteRequest
{
    public function __construct(
        protected readonly string $subscriptionTemplateId,
    ) {
        //
    }

    public function resolveEndpoint(): string
    {
        return "subscription_templates/{$this->subscriptionTemplateId}";
    }
}
