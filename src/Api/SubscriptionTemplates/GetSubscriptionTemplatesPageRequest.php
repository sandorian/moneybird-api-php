<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Api\SubscriptionTemplates;

use Saloon\Http\Response;
use Sandorian\Moneybird\Api\Support\BaseJsonGetRequest;

class GetSubscriptionTemplatesPageRequest extends BaseJsonGetRequest
{
    public function resolveEndpoint(): string
    {
        return 'subscription_templates';
    }

    /**
     * @return array<SubscriptionTemplate>
     */
    public function createDtoFromResponse(Response $response): array
    {
        return array_map(
            fn (array $data) => SubscriptionTemplate::createFromResponseData($data),
            $response->json()
        );
    }
}
