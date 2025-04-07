<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Api\Webhooks;

use Saloon\Http\Response;
use Sandorian\Moneybird\Api\Support\BaseJsonPostRequest;
use Sandorian\Moneybird\Api\Support\EncapsulatesData;

class CreateWebhookRequest extends BaseJsonPostRequest
{
    use EncapsulatesData;

    public function __construct(
        private readonly array $data = []
    ) {
        if (! empty($this->data)) {
            $this->setEncapsulatedData($this->data);
        }
    }

    public function resolveEndpoint(): string
    {
        return 'webhooks';
    }

    protected function defaultBody(): array
    {
        return [];
    }

    /**
     * Get the resource key for encapsulation
     *
     * The Moneybird API requires data to be encapsulated within a 'webhook' key
     */
    protected function getResourceKey(): string
    {
        return 'webhook';
    }

    public function createDtoFromResponse(Response $response): mixed
    {
        return Webhook::createFromResponseData($response->json());
    }
}
