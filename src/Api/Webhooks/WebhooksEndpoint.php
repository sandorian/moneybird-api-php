<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Api\Webhooks;

use Sandorian\Moneybird\Api\Support\BaseEndpoint;

/**
 * @method Webhook create(array $data)
 */
class WebhooksEndpoint extends BaseEndpoint
{
    protected function getCreateRequest(): CreateWebhookRequest
    {
        return new CreateWebhookRequest;
    }
}
