<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Api\SubscriptionTemplates;

use Saloon\Http\Response;
use Sandorian\Moneybird\Api\Support\BaseJsonGetRequest;

class GetSubscriptionTemplateRequest extends BaseJsonGetRequest
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

    public function createDtoFromResponse(Response $response): SubscriptionTemplate
    {
        return SubscriptionTemplate::createFromResponseData($response->json());
    }
}
