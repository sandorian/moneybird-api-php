<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Api\Webhooks;

use Saloon\Http\Response;
use Sandorian\Moneybird\Api\Support\BaseJsonPostRequest;

class CreateWebhookRequest extends BaseJsonPostRequest
{
    public function resolveEndpoint(): string
    {
        return 'webhooks';
    }

    public function createDtoFromResponse(Response $response): mixed
    {
        return Webhook::createFromResponseData($response->json());
    }
}
