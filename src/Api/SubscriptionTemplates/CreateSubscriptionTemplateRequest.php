<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Api\SubscriptionTemplates;

use Saloon\Http\Response;
use Sandorian\Moneybird\Api\Support\BaseJsonPostRequest;

class CreateSubscriptionTemplateRequest extends BaseJsonPostRequest
{
    public function resolveEndpoint(): string
    {
        return 'subscription_templates';
    }

    public function createDtoFromResponse(Response $response): SubscriptionTemplate
    {
        return SubscriptionTemplate::createFromResponseData($response->json());
    }
}
