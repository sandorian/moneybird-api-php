<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Api\Webhooks;

use Saloon\Http\Request;
use Sandorian\Moneybird\Api\Support\BaseEndpoint;
use Sandorian\Moneybird\Tests\Api\Webhooks\CreateWebhookRequest;
use Sandorian\Moneybird\Tests\Api\Webhooks\Webhook;

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
